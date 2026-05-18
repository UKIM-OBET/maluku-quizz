<?php
$base = 'http://127.0.0.1:8001';
$cookie = tempnam(sys_get_temp_dir(), 'c');
function req($method, $url, $data = null) {
    global $base, $cookie;
    $ch = curl_init($base . $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie);
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [$code, $res];
}

list($code, $body) = req('GET', '/login');
preg_match('/name="_token" value="([^"]+)"/', $body, $m);
if (empty($m[1])) {
    echo "NO_CSRF\n";
    exit(1);
}
$token = $m[1];
list($code, $body) = req('POST', '/login', ['_token' => $token, 'email' => 'murid@example.com', 'password' => 'password123']);
echo "LOGIN=" . $code . "\n";
list($code, $body) = req('GET', '/student/quizzes');
echo "QUIZZES=" . $code . "\n";
preg_match('/href="\/student\/quizzes\/(\d+)"/', $body, $m);
$qid = $m[1] ?? null;
if (!$qid) {
    echo "NO_QUIZ\n";
    exit(1);
}
list($code, $body) = req('GET', '/student/quizzes/' . $qid);
echo "TAKE=" . $code . "\n";
preg_match_all('/name="answers\[(\d+)\]" value="([^"]+)"/', $body, $matches);
if (empty($matches[1])) {
    echo "NO_OPTIONS\n";
    exit(1);
}
$answers = [];
foreach ($matches[1] as $i => $qid2) {
    $answers['answers[' . $qid2 . ']'] = $matches[2][$i];
}
preg_match('/name="_token" value="([^"]+)"/', $body, $m);
if (empty($m[1])) {
    echo "NO_CSRF2\n";
    exit(1);
}
$answers['_token'] = $m[1];
list($code, $body) = req('POST', '/student/quizzes/' . $qid, $answers);
echo "SUBMIT=" . $code . "\n";
if (strpos($body, 'Skor Anda') !== false || strpos($body, 'Leaderboard Nilai Kuis') !== false) {
    echo "SCORE_OK\n";
} else {
    echo "SCORE_MISS\n";
}
list($code, $body) = req('GET', '/student/leaderboard');
echo "BOARD=" . $code . "\n";
if (strpos($body, 'Leaderboard Nilai Kuis') !== false) {
    echo "BOARD_OK\n";
} else {
    echo "BOARD_MISS\n";
}
