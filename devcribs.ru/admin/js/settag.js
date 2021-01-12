function set(tag){
              var text =  $('textarea').val();
              text = text + tag;
              $('textarea').val(text);
            }  
            
function link(){
    set('<a href=""> </a>');
}

function paragraf(){
    set('<p> </p>');
}

function bold(){
    set('<b> </b>');
}

function italic(){
    set('<i> </i>');
}

function h1(){
    set('<h1> </h1>');
}

function h2(){
    set('<h2> </h2>');
}

function h3(){
    set('<h3> </h3>');
}

function h4(){
    set('<h4> </h4>');
}

function h5(){
    set('<h5> </h5>');
}

function h6(){
    set('<h6> </h6>');
}

function pre(){
    set('<pre class="brush: java;"> </pre>');
}

function img(){
    set('<img style="padding: 15px;" width="670" src="" />');
}

function img2(){
    set('<img style="float:left; padding: 15px;" width="400" src="" />');
}
            