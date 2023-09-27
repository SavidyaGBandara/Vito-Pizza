console.log(123);

var slide_val = 120;
if (window.innerWidth > 760) slide_val = 200;
function slide(dir, elm) {
    let slide_elm = elm.parentElement.children[2];
    if (dir == "l") {
        if (parseInt(slide_elm.dataset.x) * -1 >= (parseInt(slide_elm.dataset.len) - 4) * slide_val) {
            elm.parentElement.children[3].classList.add("hide");
            return;
        }
        elm.parentElement.children[4].classList.remove("hide");
        slide_elm.style.transform = `translateX(${parseInt(slide_elm.dataset.x) - slide_val}px)`;
        slide_elm.dataset.x = parseInt(slide_elm.dataset.x) - slide_val;
    } else {
        if (parseInt(slide_elm.dataset.x) >= 0) {
            elm.parentElement.children[4].classList.add("hide");
            return;
        }
        elm.parentElement.children[3].classList.remove("hide");
        slide_elm.style.transform = `translateX(${parseInt(slide_elm.dataset.x) + slide_val}px)`;
        slide_elm.dataset.x = parseInt(slide_elm.dataset.x) + slide_val;
    }
}

// tmp1 =
//     window.location.origin +
//     window.location.pathname.slice(0, window.location.pathname.length - 9) +
//     "product.php?product=" + ;
// console.log(tmp1);

// HTMLDivElement.
