<?php
session_start();

// セッションデータがない場合、フォームページにリダイレクト
if (!isset($_SESSION['form_data'])) {
    header('Location: analyzeForm.php');
    exit;
}

// 「修正する」ボタンを押した場合
if (isset($_GET['edit'])) {
    $_SESSION['from_confirm'] = true; // フラグをセット
    header('Location: analyzeForm.php');
    exit;
}

// 入力データを取得
$form_data = $_SESSION['form_data'];

// 各質問文を対応付ける配列
$questions = [
    "core_values" => "これまでの人生で最も印象に残っている出来事は何ですか？その出来事から何を学びましたか？",
    "accomplishment" => "何かを成し遂げた時、一番嬉しかったことは何ですか？その経験から、自分の強みだと気づいたことはありますか？",
    "lesson" => "失敗した経験から学んだことで、最も大きかったことは何ですか？",
    "core_values_repeat" => "過去の経験から、自分が大切にしている価値観は何だと思いますか？",
    "compliment" => "あなたが周りからよく褒められることは何ですか？",
    "coping" => "あなたはストレスを感じるとき、どのように対処しますか？",
    "challenge_feelings" => "新しいことに挑戦する時、どんな気持ちになりますか？",
    "ideal_self" => "あなたの理想の自分はどんな姿ですか？",
    "future_self" => "5年後の自分はどうなっていたいですか？",
    "contribution" => "どんな仕事や生き方で、社会に貢献したいですか？",
    "life_priority" => "あなたにとって、人生で最も大切にしたいことは何ですか？",
    "redo" => "もし、人生をやり直せるなら、どんなことをしたいですか？",
    "strength" => "あなたが最も得意なことを一つ挙げ、その理由を具体的に説明してください。",
    "weakness" => "あなたが最も苦手なことを一つ挙げ、その理由を具体的に説明してください。",
    "growth" => "過去に最も成長できた経験は何ですか？その経験から、何を学びましたか？",
    "relationship_value" => "人間関係において、最も大切にしていることは何ですか？",
    "advice" => "もし、誰かに人間関係で何か一つだけアドバイスできるとしたら、どんなことを言いますか？",
    "stress_management" => "ストレスを感じた時、どのように対処しますか？",
    "happiness" => "幸せを感じる瞬間は、どのような時ですか？",
    "adaptability" => "変化に対して、あなたはどちらかと言えば積極的に対応する方ですか、それとも消極的な方ですか？"
];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>入力内容の確認</title>
    <link rel="stylesheet" href="../css/confirm.css">
</head>

<body>
    <header>
        <h1>入力内容の確認</h1>
    </header>
    <main>
        <div class="container">
            <div class="card">
                <h2>以下の内容で送信します</h2>

                <form method="POST" action="submit.php">
                    <?php foreach ($form_data as $key => $value): ?>
                        <div class="form-group">
                            <h3><?php echo isset($questions[$key]) ? htmlspecialchars($questions[$key]) : htmlspecialchars($key); ?></h3>
                            <p><?php echo nl2br(htmlspecialchars($value, ENT_QUOTES, 'UTF-8')); ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="button-group">
                        <!-- 修正ボタンを `GET` で送信 -->
                        <a href="confirm.php?edit=true" class="button">修正する</a>

                        <!-- 送信ボタン -->
                        <form method="POST" action="submit.php">
                            <button type="submit" class="button">送信する</button>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>