var paragraphs = document.querySelectorAll("p");
console.log("ʳ������ ���������� <p>: ", paragraphs.length);

var h2s = document.querySelectorAll("h2");
console.log("ʳ������ ��������� <h2>: ", h2s.length);

var bodyStyles = getComputedStyle(document.body);
console.log("background-color ��� <body>: ", bodyStyles.backgroundColor);

var h1 = document.querySelector("h1");
if (h1) {
    const h1Styles = getComputedStyle(h1);
    console.log("font-size ��� <h1>: ", h1Styles.fontSize);
} else {
    console.log("�� ������� ���� <h1>.");
}

var allElements = document.querySelectorAll("*");

allElements.forEach(el => {
    let originalColor = "";

    el.addEventListener("mouseenter", () => {
        originalColor = getComputedStyle(el).backgroundColor;
        el.style.backgroundColor = "red";
    });

    el.addEventListener("mouseleave", () => {
        el.style.backgroundColor = originalColor;
    });
});

