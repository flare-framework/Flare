<?php

namespace Libraries;

class UrlSigner
{
    protected string $secret;

    public function __construct()
    {
        $this->secret = " "; ///set string
    }

    /**
     * تولید لینک امن با امضای HMAC
     */
    public function generate(string $url, int $expires = 7200): string
    {
        $expiresAt = time() + $expires;
        $signature = hash_hmac('sha256', $url . $expiresAt, $this->secret);

        $parsedUrl = parse_url($url);
        $query = isset($parsedUrl['query']) ? $parsedUrl['query'] . '&' : '';
        $query .= http_build_query([
            'expires' => $expiresAt,
            'signature' => $signature,
        ]);

        return $this->buildUrl($parsedUrl, $query);
    }

    /**
     * اعتبارسنجی لینک امن
     */
    public function isValid(string $url, int $expires, string $signature): bool
    {
        if (time() > $expires) {
            return false;
        }

        $expected = hash_hmac('sha256', $url . $expires, $this->secret);
        return hash_equals($expected, $signature);
    }

    /**
     * ساخت URL با پارامتر جدید
     */
    protected function buildUrl(array $parsed, string $query): string
    {
        $scheme = $parsed['scheme'] ?? 'https';
        $host = $parsed['host'] ?? '';
        $port = isset($parsed['port']) ? ':' . $parsed['port'] : '';
        $path = $parsed['path'] ?? '';
        return "$scheme://$host$port$path?$query";
    }

    /**
     * امضای ID برای استفاده امن در فرانت
     */
    public function signId($id, int $expires = 7200): string
    {
        $expiresAt = time() + $expires;
        $payload = "{$id}|{$expiresAt}";
        $signature = hash_hmac('sha256', $payload, $this->secret);
        return base64_encode("{$payload}|{$signature}");
    }

    /**
     * بررسی صحت امضای ID
     */
    public function verifyId(string $signed)
    {
        $decoded = base64_decode($signed, true); // strict decode

        if ($decoded === false) return false;

        $parts = explode('|', $decoded);

        if (count($parts) !== 3) return false;

        [$id, $expires, $signature] = $parts;

        if (time() > (int)$expires) return false;

        $expected = hash_hmac('sha256', "{$id}|{$expires}", $this->secret);

        if (!hash_equals($expected, $signature)) return false;

        return $id;
    }
}
