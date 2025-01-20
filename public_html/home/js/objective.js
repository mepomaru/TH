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
        "life_priority",
        "redo",
        "strength",
        "weakness",
        "growth",
        "relationship_value",
        "advice",
        "stress_management",
        "happiness",
        "adaptability"
    ];

    fields.forEach(field => {
        const textareaId = "textBox-" + field;
        const countSpanId = "charCount-" + field;
        initializeCharCount(textareaId, countSpanId);
    });
});

const navigateForm = document.getElementById("objective-form");

navigateForm.addEventListener("submit", (event) => {
    // ロードフラグをセット
    localStorage.setItem("showLoading", "true");
    // フォーム送信後に画面遷移 (デフォルト動作を許可)
});