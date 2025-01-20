<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>分析用フォーム</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/analyzeForm.css">
    <script src=""></script>
</head>

<body>
    <!-- header -->
    <header>
        <h2>自己分析用フォーム</h2>
    </header>
    <!-- /header -->


    <!-- main -->
    <main>
        <from id="analyzeFrom" method="POST" action="">

            <div class="form-container">
                <!-- 主観的質問 -->
                <h3>主観的に自分を分析する質問</h3>
                <div>
                    <label for="core_values" class="card">これまでの人生で、最も印象に残っている出来事は何ですか？その出来事から何を学びましたか？</label>
                    <input type="text" name="core_values" id="core_values" required>
                </div>

                <div>
                    <label for="accomplishment" class="card">何かを成し遂げた時、一番嬉しかったことは何ですか？その経験から、自分の強みだと気づいたことはありますか？</label>
                    <input type="text" name="accomplishment" id="accomplishment" required>
                </div>

                <div>
                    <label for="lesson" class="card">失敗した経験から学んだことで、最も大きかったことは何ですか？</label>
                    <input type="text" name="lesson" id="lesson" required>
                </div>

                <div>
                    <label for="core_values" class="card">過去の経験から、自分が大切にしている価値観は何だと気づきましたか？</label>
                    <input type="text" name="core_values" id="core_values" required>
                </div>

                <div>
                    <label for="compliment" class="card">周りからよく褒められることは何ですか？</label>
                    <input type="text" name="compliment" id="compliment" required>
                </div>

                <div>
                    <label for="coping" class="card">ストレスを感じるとき、どのように対処しますか？</label>
                    <input type="text" name="coping" id="coping" required>
                </div>

                <div>
                    <label for="challenge_feelings" class="card">新しいことに挑戦する時、どんな気持ちになりますか？</label>
                    <input type="text" name="challenge_feelings" id="challenge_feelings" required>
                </div>

                <div>
                    <label for="ideal_self" class="card">理想の自分はどんな姿ですか？</label>
                    <input type="text" name="ideal_self" id="ideal_self" required>
                </div>

                <div>
                    <label for="future_self" class="card">5年後の自分はどうなっていたいですか？</label>
                    <input type="text" name="future_self" id="future_self" required>
                </div>

                <div>
                    <label for="contribution" class="card">どんな仕事や生き方で、社会に貢献したいですか？</label>
                    <input type="text" name="contribution" id="contribution" required>
                </div>
                <!-- /主観的質問 -->

                <!-- 客観的質問 -->
                <h3>客観的に自分を分析する質問</h3>
                <div>
                    <label for="life_priority" class="card">あなたにとって、人生で最も大切にしたいことは何ですか？</label>
                    <input type="text" name="life_priority" id="life_priority" required>
                </div>

                <div>
                    <label for="redo" class="card">もし、人生をやり直せるなら、どんなことをしたいですか？</label>
                    <input type="text" name="redo" id="redo" required>
                </div>

                <div>
                    <label for="strength" class="card">あなたが最も得意なことを一つ挙げ、その理由を具体的に説明してください。</label>
                    <input type="text" name="strength" id="strength" required>
                </div>

                <div>
                    <label for="weakness" class="card">あなたが最も苦手なことを一つ挙げ、その理由を具体的に説明してください。</label>
                    <input type="text" name="weakness" id="weakness" required>
                </div>

                <div>
                    <label for="growth" class="card">過去に最も成長できた経験は何ですか？その経験から、何を学びましたか？</label>
                    <input type="text" name="growth" id="growth" required>
                </div>

                <div>
                    <label for="relationship_value" class="card">人間関係において、最も大切にしていることは何ですか？</label>
                    <input type="text" name="relationship_value" id="relationship_value" required>
                </div>

                <div>
                    <label for="advice" class="card">もし、誰か人間関係で何か一つだけアドバイスできるとしたら、どんなことを言いますか？</label>
                    <input type="text" name="advice" id="advice" required>
                </div>

                <div>
                    <label for="stress_management" class="card">ストレスを感じた時、どのように対処しますか？</label>
                    <input type="text" name="stress_management" id="stress_management" required>
                </div>

                <div>
                    <label for="happiness" class="card">幸せを感じる瞬間は、どのような時ですか？</label>
                    <input type="text" name="happiness" id="happiness" required>
                </div>

                <div>
                    <label for="adaptability" class="card">変化に対して、あなたはどちらかと言えば積極的に対応する方ですか、それとも消極的な方ですか？</label>
                    <input type="text" name="adaptability" id="adaptability" required>
                </div>
                <!-- /客観的質問 -->
            </div>

            <div id="registration" class="button-item">
                <button class="registration" type="submit">提出する</button>
            </div>
        </from>
    </main>
    <!-- /main -->
</body>

</html>