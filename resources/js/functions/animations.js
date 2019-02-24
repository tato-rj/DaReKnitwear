smoothLoad = function(element)
{
    let parent = $(element);
    let divs = parent.children();

    while (divs.length) {
        parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
    }
    
    parent.animate({ opacity: 1 }, 400);
}