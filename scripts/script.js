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

window.addEventListener("load", () => {
    setTimeout(show_images, 5000);
});

function show_images() {
    let imagesUrl = [
        "https://upload.wikimedia.org/wikipedia/commons/7/74/A-Cat.jpg",
        "https://t4.ftcdn.net/jpg/02/66/72/41/360_F_266724172_Iy8gdKgMa7XmrhYYxLCxyhx6J7070Pr8.jpg",
        "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeKOOpLy92UjzQxq8NCxgxOQJbj_YVdfHO_g&s",
        "https://cms.bps.org.uk/sites/default/files/2022-09/Grumpy%20cat%202.jpeg"
    ];

    const gallery = document.getElementById("gallery");

    const fragment = document.createDocumentFragment();

    imagesUrl.forEach((url, index) => {
        setTimeout(() => {
            const img = document.createElement("img");
            img.src = url;
            img.alt = `Image ${index + 1}`;
            img.style.margin = "10px";
            fragment.appendChild(img);
            gallery.appendChild(fragment);
        }, index * 1000);
    });
}


