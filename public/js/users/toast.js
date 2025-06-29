const customNotice = async (icon, content, type = 1) => {
    let alert = htmlToElement(
        `<div class="container"><span class="slide"></span><p class="toast-text"><i class="${icon}"></i> ${content} </p></div>`
    );

    const notice = document.querySelector("#notice");
    notice.appendChild(alert);

    // Luôn nền trắng
    alert.style.backgroundColor = "#ffffff";

    // Lấy các phần tử để thay đổi màu
    const slide = alert.querySelector(".slide");
    const text = alert.querySelector(".toast-text");

    // Tùy theo type
    switch (type) {
        case 1: // success - xanh
            slide.style.backgroundColor = "#33c731";
            text.style.color = "#186b16";
            break;
        case 2: // warning - vàng (nếu cần)
            slide.style.backgroundColor = "#e6b800";
            text.style.color = "#e6b800";
            break;
        case 3: // error - đỏ
            slide.style.backgroundColor = "#d32f2f";
            text.style.color = "#d32f2f";
            break;
        default:
            slide.style.backgroundColor = "#888";
            text.style.color = "#333";
    }

    // Hiệu ứng slide/fade
    slide.classList.add("slide");
    await sleep(3000);
    slide.style.width = "0";
    alert.classList.add("fade");
    await sleep(800);
    notice.removeChild(alert);
};


const htmlToElement = (html) => {
    var template = document.createElement("template");
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
};

function sleep(ms) {
    return new Promise((resolve) => setTimeout(resolve, ms));
}
