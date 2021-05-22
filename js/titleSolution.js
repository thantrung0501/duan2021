titleProcess = title => {
    if ($(window).width() < 850) {
        if (title.length > 20) return title.slice(0, 20) + "...";
        else return title;

    }else if ($(window).width() > 850 && $(window).width() < 1400) {
        if (title.length > 60) return title.slice(0, 40) + "...";
        else return title;

    } else {
        if (title.length > 60) return title.slice(0, 60) + "...";
        else return title;
    }
}