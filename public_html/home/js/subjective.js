// テキストエリアと文字数表示要素を取得し、イベントを設定する関数
function initializeCharCount(textareaId, countSpanId) {
    const textarea = document.getElementById(textareaId);
    const charCount = document.getElementById(countSpanId);

    if (textarea && charCount) {
        // 初期の文字数表示
        charCount.textContent = textarea.value.length;

        // テキストが入力されるたびに文字数を更新
        textarea.addEventListener("input", () => {
            charCount.textContent = textarea.value.length;
        });
    }
}

// ページが読み込まれたときに各テキストエリアにイベントを設定
window.addEventListener("DOMContentLoaded", () => {
    const fields = [
        "memorable_event",
        "accomplishment",
        "lesson",
        "core_values",
        "compliment",
        "coping",
        "challenge_feelings",
        "ideal_self",
        "future_self",
        "contribution"
    ];

    fields.forEach(field => {
        const textareaId = "textBox-" + field;
        const countSpanId = "charCount-" + field;
        initializeCharCount(textareaId, countSpanId);
    });
});

