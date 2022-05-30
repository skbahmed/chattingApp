var root = document.querySelector(':root'),
html = document.querySelector('html'),
body = document.querySelector('body'),
darkmodeOn = document.getElementById('dark-on'),
darkmodeOff = document.getElementById('dark-off'),
gradientOn = document.getElementById('gradient-on'),
gradientOff = document.getElementById('gradient-off');



//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// DARK MODE SWITCHER FUNCTION ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

function defaultLightSwitch(){ //if light mode is default
    if(darkmodeOff.hasAttribute('checked', 'checked')){ //when "off" switch is checked
        html.setAttribute('data-theme', 'light');
    
        darkmodeOn.onclick = ()=>{ //when clicked on "on" switch
            darkmodeOff.removeAttribute('checked');
            darkmodeOn.setAttribute('checked', 'checked');
            html.setAttribute('data-theme', 'dark');
        }
        darkmodeOff.onclick = ()=>{ //when clicked on "off" switch
            darkmodeOn.removeAttribute('checked');
            darkmodeOff.setAttribute('checked', 'checked');
            html.setAttribute('data-theme', 'light');
        }
    }
}
defaultLightSwitch(); //function called
//////////////////////////////////////////////////////////////////////////////////////////////
function defaultDarkSwitch(){ //if dark mode is default
    if(darkmodeOn.hasAttribute('checked', 'checked')){ //when "on" switch is checked
        html.setAttribute('data-theme', 'dark');
    
        darkmodeOn.onclick = ()=>{ //when clicked on "on" switch
            darkmodeOff.removeAttribute('checked');
            darkmodeOn.setAttribute('checked', 'checked');
            html.setAttribute('data-theme', 'dark');
        }
        darkmodeOff.onclick = ()=>{ //when clicked on "off" switch
            darkmodeOn.removeAttribute('checked');
            darkmodeOff.setAttribute('checked', 'checked');
            html.setAttribute('data-theme', 'light');
        }
    }
}
defaultDarkSwitch(); //function called

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// GRADIENT MODE SWITCHER FUNCTION ////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

function defaultColorSwitch(){ //if color mode is default
    if(gradientOff.hasAttribute('checked', 'checked')){ //when "off" switch is checked
        body.classList.remove('theme-gradient');
    
        gradientOn.onclick = ()=>{ //when clicked on "on" switch
            gradientOff.removeAttribute('checked');
            gradientOn.setAttribute('checked', 'checked');
            body.classList.add('theme-gradient')
        }
        gradientOff.onclick = ()=>{ //when clicked on "off" switch
            gradientOn.removeAttribute('checked');
            gradientOff.setAttribute('checked', 'checked');
            body.classList.remove('theme-gradient')
        }
    }
}
defaultColorSwitch(); //function called
//////////////////////////////////////////////////////////////////////////////////////////////
function defaultGradientSwitch(){ //if gradient mode is default
    if(gradientOn.hasAttribute('checked', 'checked')){ //when "on" switch is checked
        body.classList.add('theme-gradient');
    
        gradientOn.onclick = ()=>{ //when clicked on "on" switch
            gradientOff.removeAttribute('checked');
            gradientOn.setAttribute('checked', 'checked');
            body.classList.add('theme-gradient')
        }
        gradientOff.onclick = ()=>{ //when clicked on "off" switch
            gradientOn.removeAttribute('checked');
            gradientOff.setAttribute('checked', 'checked');
            body.classList.remove('theme-gradient')
        }
    }
}
defaultGradientSwitch(); //function called

//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////