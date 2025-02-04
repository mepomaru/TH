<?php
session_start();
include '../../../data/def/def.php'; // データベース接続設定ファイル

// デバッグ用
error_log("🔵 submit.php に遷移しました");

// `confirm.php` からの POST データがある場合、セッションに保存
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['form_data'])) {
    error_log("✅ データが確認できました");
} else {
    error_log("❌ データがありません");
    die("エラー: 入力データがありません。");
}

// セッションからデータ取得
$form_data = $_SESSION['form_data'];
$account_id = $_SESSION['account_id']; // `user` テーブルの `account_id`

// データベース接続
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$conn) {
    die("データベース接続エラー: " . mysqli_connect_error());
}

// SQL準備
$sql = "INSERT INTO answers 
    (account_id, core_values_ans, accomplishment_ans, lesson_ans, core_values_repeat_ans, 
     compliment_ans, coping_ans, challenge_feelings_ans, ideal_self_ans, future_self_ans, 
     contribution_ans, life_priority_ans, redo_ans, strength_ans, weakness_ans, 
     growth_ans, relationship_value_ans, advice_ans, stress_management_ans, 
     happiness_ans, adaptability_ans) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    die("SQL準備エラー: " . mysqli_error($conn));
}

// パラメータをバインド
mysqli_stmt_bind_param(
    $stmt,
    "issssssssssssssssssss",
    $account_id,
    $form_data['core_values'],
    $form_data['accomplishment'],
    $form_data['lesson'],
    $form_data['core_values_repeat'],
    $form_data['compliment'],
    $form_data['coping'],
    $form_data['challenge_feelings'],
    $form_data['ideal_self'],
    $form_data['future_self'],
    $form_data['contribution'],
    $form_data['life_priority'],
    $form_data['redo'],
    $form_data['strength'],
    $form_data['weakness'],
    $form_data['growth'],
    $form_data['relationship_value'],
    $form_data['advice'],
    $form_data['stress_management'],
    $form_data['happiness'],
    $form_data['adaptability']
);

// SQL実行
if (mysqli_stmt_execute($stmt)) {
    // データ登録成功 → ローディング画面へ遷移
    $_SESSION['form_data']['id'] = mysqli_insert_id($conn); // 挿入したデータのIDを保存
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    header("Location: loding.php");
    exit;
} else {
    echo "エラー: " . mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
