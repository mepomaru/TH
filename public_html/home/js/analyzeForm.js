document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("textarea").forEach(textarea => {
        const counter = document.getElementById(textarea.id + "_count");

        // 初期文字数をセット
        counter.textContent = textarea.value.length;

        // 入力時に文字数を更新
        textarea.addEventListener("input", () => {
            counter.textContent = textarea.value.length;
        });
    });
});
