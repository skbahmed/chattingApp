var darkmodeOn = document.getElementById('dark-on'),
darkmodeOff = document.getElementById('dark-off');

var storedTheme = localStorage.getItem('theme') || (window.matchMedia("(prefers-color-scheme: dark)").matches ? "light" : "dark");

if (storedTheme){
    document.documentElement.setAttribute('data-theme', storedTheme)

    darkmodeOn.onclick = function() {
        var targetTheme = "dark";
        document.documentElement.setAttribute('data-theme', targetTheme);
        localStorage.setItem('theme', targetTheme);
    };

    darkmodeOff.onclick = function() {
        var targetTheme = "light";
        document.documentElement.setAttribute('data-theme', targetTheme)
        localStorage.setItem('theme', targetTheme);
    };

}



