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
        <h1>自己分析用フォーム</h1>
    </header>
    <!-- /header -->


    <!-- main -->
    <main>
        <div class="container">
            <div class="card">
                <from id="analyzeFrom" method="POST" action="">
                    <!-- 主観的質問 -->
                    <h2>主観的に自分を分析する質問</h2>
                    <div>
                        <label for="core_values">
                            <h3>これまでの人生で、最も印象に残っている出来事は何ですか？その出来事から何を学びましたか？</h3>
                        </label>
                        <textarea id="core_values" name="core_values" rows="7" cols="50" required></textarea>
                        <span id="core_values_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="accomplishment">
                            <h3>何かを成し遂げた時、一番嬉しかったことは何ですか？その経験から、自分の強みだと気づいたことはありますか？</h3>
                        </label>
                        <textarea id="accomplishment" name="accomplishment" rows="7" cols="50" required></textarea>
                        <span id="accomplishment_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="lesson">
                            <h3>失敗した経験から学んだことで、最も大きかったことは何ですか？</h3>
                        </label>
                        <textarea id="lesson" name="lesson" rows="7" cols="50" required></textarea>
                        <span id="lesson_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="core_values_repeat">
                            <h3>過去の経験から、自分が大切にしている価値観は何だと思いますか？</h3>
                        </label>
                        <textarea id="core_values_repeat" name="core_values_repeat" rows="7" cols="50" required></textarea>
                        <span id="core_values_repeat_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="compliment">
                            <h3>あなたが周りからよく褒められることは何ですか？</h3>
                        </label>
                        <textarea id="compliment" name="compliment" rows="7" cols="50" required></textarea>
                        <span id="compliment_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="coping">
                            <h3>あなたはストレスを感じるとき、どのように対処しますか？</h3>
                        </label>
                        <textarea id="coping" name="coping" rows="7" cols="50" required></textarea>
                        <span id="coping_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="challenge_feelings">
                            <h3>新しいことに挑戦する時、どんな気持ちになりますか？</h3>
                        </label>
                        <textarea id="challenge_feelings" name="challenge_feelings" rows="7" cols="50" required></textarea>
                        <span id="challenge_feelings_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="ideal_self">
                            <h3>あなたの理想の自分はどんな姿ですか？</h3>
                        </label>
                        <textarea id="ideal_self" name="ideal_self" rows="7" cols="50" required></textarea>
                        <span id="ideal_self_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="future_self">
                            <h3>5年後の自分はどうなっていたいですか？</h3>
                        </label>
                        <textarea id="future_self" name="future_self" rows="7" cols="50" required></textarea>
                        <span id="future_self_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="contribution">
                            <h3>どんな仕事や生き方で、社会に貢献したいですか？</h3>
                        </label>
                        <textarea id="contribution" name="contribution" rows="7" cols="50" required></textarea>
                        <span id="contribution_count">0</span>文字<br>
                    </div>
                    <!-- /主観的質問 -->

                    <!-- 客観的質問 -->
                    <h3>客観的に自分を分析する質問</h3>

                    <div>
                        <label for="life_priority">
                            <h3>あなたにとって、人生で最も大切にしたいことは何ですか？</h3>
                        </label>
                        <textarea id="life_priority" name="life_priority" rows="7" cols="50" required></textarea>
                        <span id="life_priority_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="redo">
                            <h3>もし、人生をやり直せるなら、どんなことをしたいですか？</h3>
                        </label>
                        <textarea id="redo" name="redo" rows="7" cols="50" required></textarea>
                        <span id="redo_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="strength">
                            <h3>あなたが最も得意なことを一つ挙げ、その理由を具体的に説明してください。</h3>
                        </label>
                        <textarea id="strength" name="strength" rows="7" cols="50" required></textarea>
                        <span id="strength_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="weakness">
                            <h3>あなたが最も苦手なことを一つ挙げ、その理由を具体的に説明してください。</h3>
                        </label>
                        <textarea id="weakness" name="weakness" rows="7" cols="50" required></textarea>
                        <span id="weakness_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="growth">
                            <h3>過去に最も成長できた経験は何ですか？その経験から、何を学びましたか？</h3>
                        </label>
                        <textarea id="growth" name="growth" rows="7" cols="50" required></textarea>
                        <span id="growth_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="relationship_value">
                            <h3>人間関係において、最も大切にしていることは何ですか？</h3>
                        </label>
                        <textarea id="relationship_value" name="relationship_value" rows="7" cols="50" required></textarea>
                        <span id="relationship_value_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="advice">
                            <h3>もし、誰かに人間関係で何か一つだけアドバイスできるとしたら、どんなことを言いますか？</h3>
                        </label>
                        <textarea id="advice" name="advice" rows="7" cols="50" required></textarea>
                        <span id="advice_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="stress_management">
                            <h3>ストレスを感じた時、どのように対処しますか？</h3>
                        </label>
                        <textarea id="stress_management" name="stress_management" rows="7" cols="50" required></textarea>
                        <span id="stress_management_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="happiness">
                            <h3>幸せを感じる瞬間は、どのような時ですか？</h3>
                        </label>
                        <textarea id="happiness" name="happiness" rows="7" cols="50" required></textarea>
                        <span id="happiness_count">0</span>文字<br>
                    </div>

                    <div>
                        <label for="adaptability">
                            <h3>変化に対して、あなたはどちらかと言えば積極的に対応する方ですか、それとも消極的な方ですか？</h3>
                        </label>
                        <textarea id="adaptability" name="adaptability" rows="7" cols="50" required></textarea>
                        <span id="adaptability_count">0</span>文字<br>
                    </div>
                    <!-- /客観的質問 -->

                    <!-- 送信ボタン -->
                    <div id="registration" class="button-item">
                        <button class="registration" type="submit">提出する</button>
                    </div>
                    <!-- /送信ボタン -->
                </from>
            </div>
        </div>
    </main>
    <!-- /main -->
</body>

</html>