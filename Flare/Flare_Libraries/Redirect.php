<?php
namespace Flare_Libraries;

class Redirect
{
    protected string $url;
    protected int $statusCode = 302;
    protected array $flashMessages = [];
    protected bool $sessionStarted = false;
    protected bool $jsonResponse = false;
    protected array $queryParams = [];

    public function __construct(string $url = '')
    {
        $this->url = $this->sanitizeUrl($url ?: $_SERVER['REQUEST_URI']);
        $this->startSession();
    }

    protected function sanitizeUrl(string $url): string
    {
        // جلوگیری از HTTP Response Splitting با حذف CR/LF
        return filter_var(str_replace(["\r", "\n"], '', URL . ltrim($url, '/')), FILTER_SANITIZE_URL);
    }

    protected function startSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->sessionStarted = true;
    }

    public function with(string $key, $value): self
    {
        if (isset($this->flashMessages[$key])) {
            if (!is_array($this->flashMessages[$key])) {
                $this->flashMessages[$key] = [$this->flashMessages[$key]];
            }
            $this->flashMessages[$key][] = $value;
        } else {
            $this->flashMessages[$key] = $value;
        }
        return $this;
    }

    public function withErrors(array|string $errors): self
    {
        $errors = is_array($errors) ? $errors : [$errors];
        foreach ($errors as $error) {
            $this->with('error', $error);
        }
        return $this;
    }

    public function withSuccess(string $message): self
    {
        return $this->with('success', $message);
    }

    public function withWarning(string $message): self
    {
        return $this->with('warning', $message);
    }

    public function withInfo(string $message): self
    {
        return $this->with('info', $message);
    }

    public function setStatusCode(int $code): self
    {
        $validCodes = [300, 301, 302, 303, 307, 308];
        if (!in_array($code, $validCodes, true)) {
            throw new \InvalidArgumentException("کد وضعیت HTTP معتبر نیست: {$code}");
        }
        $this->statusCode = $code;
        return $this;
    }

    public function withRaw(string $key, $value): self
    {
        return $this->with($key, new RawMessage($value));
    }

    public function refresh(): self
    {
        $this->url = $this->sanitizeUrl($_SERVER['REQUEST_URI']);
        return $this;
    }

    public function withQuery(array $params): self
    {
        $this->queryParams = array_merge($this->queryParams, $params);
        return $this;
    }

    public function asJson(bool $flag = true): self
    {
        $this->jsonResponse = $flag;
        return $this;
    }

    protected function storeFlashMessages(): void
    {
        if (!$this->sessionStarted) {
            $this->startSession();
        }

        if (empty($this->flashMessages)) {
            return;
        }

        // ذخیره مستقیم پیام‌ها زیر کلیدهای اصلی در سشن (error, success, warning, info و ...)
        foreach ($this->flashMessages as $key => $messages) {
            if (!is_array($messages)) {
                $messages = [$messages];
            }
            if (!isset($_SESSION[$key]) || !is_array($_SESSION[$key])) {
                $_SESSION[$key] = [];
            }
            foreach ($messages as $message) {
                if ($message instanceof RawMessage) {
                    $_SESSION[$key][] = $message->getRaw();
                } else {
                    $_SESSION[$key][] = htmlspecialchars((string)$message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                }
            }
        }
    }

    protected function buildUrl(): string
    {
        if (empty($this->queryParams)) {
            return $this->url;
        }

        $queryString = http_build_query($this->queryParams);
        $separator = (parse_url($this->url, PHP_URL_QUERY) === null) ? '?' : '&';

        return $this->url . $separator . $queryString;
    }

    public function send(): void
    {
        $this->storeFlashMessages();
        $finalUrl = $this->buildUrl();

        if ($this->jsonResponse) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['redirect' => $finalUrl], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            exit;
        }

        http_response_code($this->statusCode);
        header('Location: ' . $finalUrl);
        exit;
    }

    /**
     * نمایش پیام‌های فلش ذخیره شده در سشن و پاک کردن آن‌ها بعد از نمایش
     * باید در ویو یا قالب فراخوانی شود
     */
    public static function showFlashMessages(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $types = ['error', 'success', 'warning', 'info'];

        foreach ($types as $type) {
            if (!empty($_SESSION[$type])) {
                foreach ($_SESSION[$type] as $msg) {
                    $alertClass = match($type) {
                        'error' => 'alert-danger',
                        'success' => 'alert-success',
                        'warning' => 'alert-warning',
                        'info' => 'alert-info',
                        default => 'alert-secondary',
                    };
                    echo "<div class='alert {$alertClass}'>{$msg}</div>";
                }
                unset($_SESSION[$type]);
            }
        }
    }

    public function __toString()
    {
        return $this->buildUrl();
    }
}

class RawMessage
{
    protected string $raw;

    public function __construct(string $raw)
    {
        $this->raw = $raw;
    }

    public function getRaw(): string
    {
        return $this->raw;
    }
}
