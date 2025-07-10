<?php
    function redirect(string $page, array $query = []): void {
    $url = 'http://localhost/FreshMart?page=' . urlencode($page);

    if (!empty($query)) {
        $url .= '&' . http_build_query($query);
    }

    header("Location: $url");
    exit;
}
?>