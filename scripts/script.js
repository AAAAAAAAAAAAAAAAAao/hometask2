var paragraphs = document.querySelectorAll("p");
console.log("Кількість параграфів <p>: ", paragraphs.length);

var h2s = document.querySelectorAll("h2");
console.log("Кількість заголовків <h2>: ", h2s.length);

var bodyStyles = getComputedStyle(document.body);
console.log("background-color для <body>: ", bodyStyles.backgroundColor);

var h1 = document.querySelector("h1");
if (h1) {
    const h1Styles = getComputedStyle(h1);
    console.log("font-size для <h1>: ", h1Styles.fontSize);
} else {
    console.log("На сторінці немає <h1>.");
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

