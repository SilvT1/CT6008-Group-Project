/**Created/developed by Felicia
Section 1.1: login form
Section 1.2: forgot password form
Section 2.1: product-details form
Section 3.1: raw JS functions
**/


/**
--SECTION 1--
--1.1--
For: uognd-cms-login.php form validation
Comments: ensure login is filled in; this is in place in case the browser 
does notsupport the inbuilt HTML5 validation
**/
function validateLogin() {
    var x = document.forms["loginForm"]["email_field"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    var y = document.forms["loginForm"]["password_field"].value;
    if (y == "") {  
        alert("Password must be filled out");
        return false;
    }
}
/**
--SECTION 1--
--1.2--
For: uognd-cms-forgot_password.php form validation
Comments: ensure login is filled in; this is in place in case the browser 
does notsupport the inbuilt HTML5 validation
**/
function forgotPassword() {
    var x = document.forms["forgotPassword"]["email_field"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
/**--END SECTION 1--**/



/**
--SECTION 2--
--2.1--
For: uognd-cms-product-details.php form validation
Comments: this is the code used to create/modify the dynamic product form
    var newSlideBtns = the html which is inserted into the fieldset when 'addSlide' is called    
**/
var newSlideBtns="<img src='../www-images/cms/layout_imgs-01.svg' id='layout1' onclick='checkLayout(this,1,1)' /><img src='../www-images/cms/layout_imgs-02.svg' id='layout2' onclick='checkLayout(this,2,2)' /><img src='../www-images/cms/layout_imgs-03.svg' id='layout3' onclick='checkLayout(this,3,2)' /><img src='../www-images/cms/layout_imgs-04.svg' id='layout4' onclick='checkLayout(this,4,3)' /><img src='../www-images/cms/layout_imgs-05.svg' id='layout5' onclick='checkLayout(this,5,3)' /><img src='../www-images/cms/layout_imgs-06.svg' id='layout6' onclick='checkLayout(this,6,3)' />";
var slideCounter=0;
var maxSlidesAllowed=5;
var _productForm=document.forms["product-details"];

function addSlide(){
    //hide button if maxSlidesAllowed
    slideCounter++;
    if(slideCounter==maxSlidesAllowed){
        //remove 'add' button; limited to 5 slides
        document.forms["product-details"]["add"].style.visibility = 'hidden';
    }else{
        document.forms["product-details"]["add"].style.visibility = 'visible';
    }

    //add slide selection for form
    /*create the element (fieldset with image buttons)*/
    var _f = document.createElement("FIELDSET");
    var fieldsetID="dynamic-"+slideCounter;
    _f.setAttribute('id', fieldsetID);
    _f.setAttribute('name', fieldsetID);
    _f.innerHTML="<hr /><h3>Slide "+slideCounter+"</h3><p>Choose your layout</p><div>"+newSlideBtns+"</div>";

    var insertedNode = _productForm.insertBefore(_f, _productForm.elements.buttons);
}

function checkLayout(node,num,howMany){
    var _selectedLayout=node;
    var _parent=_selectedLayout.parentNode, 
        _descendents = _parent.getElementsByTagName('*');

    /**loop through parent and 'disable' other layouts; user could still reselect layout if they are unhappy/want to make a change**/   
    var i, e;
    for (i = 0; i < _descendents.length; i++) {
        e = _descendents[i];
        removeClass(e, "selected");
        addClass(e, "disabled");
    }

    removeClass(_selectedLayout, "disabled");
    addClass(_selectedLayout, "selected");

    changeLayout(num,_parent.parentNode,howMany);
}

function changeLayout(num,_parent,howMany){
    var creatingNew="FALSE";
    /**TO DO
    loop through 'how many' to generate form elements
    **/
    var dynamicID=_parent.id+"-";
    var hiddenLayoutInput=hiddenNumInput=null;
    var prevNum=0;

    //check if hidden elements already exist
    //add form elmeent which holds layout selection value
    if(document.getElementById(dynamicID+"layout")){
        //these already exist, so just update their values
        hiddenLayoutInput=document.getElementById(dynamicID+"layout");
        hiddenLayoutInput.value=num;
        hiddenNumInput=document.getElementById(dynamicID+"numEle");
        prevNum=hiddenNumInput.value;
        hiddenNumInput.value=howMany;
    }else{
        //these do not exist, so create
        hiddenLayoutInput="<input type='hidden' name='"+dynamicID+"layout' id='"+dynamicID+"layout' value='"+num+"' />";
        hiddenNumInput="<input type='hidden' name='"+dynamicID+"numEle' id='"+dynamicID+"numEle' value='"+howMany+"' />";
        creatingNew="TRUE";
    }

    //pass var with how many already exist
    //check if more or less
    //add/remove as appropriate
    var _elements, _which;
    if(prevNum>0 && prevNum!=howMany){
        //change to number of elements
        if(prevNum<howMany){
            _which="add";
        }else{
            _which="remove";
        }
        creatingNew="UPDATING";
        _elements=modifyFormElements(_which,howMany,_parent);
    }


    //once correct layout is chosen (above), then add to parent node
    //check if node already exists; user may have chosen different layout
    var _f, insertedNode;
    if(creatingNew=="TRUE"){
        _elements=modifyFormElements("add",howMany,_parent);

        _f = document.createElement("DIV");
        _f.setAttribute('id', dynamicID+"slideLayout");
        _f.innerHTML=hiddenLayoutInput+hiddenNumInput+_elements;

        insertedNode = _parent.appendChild(_f);
    }else if(creatingNew=="UPDATING") {
        _f = document.getElementById(dynamicID+"slideLayout");
        _f.innerHTML=hiddenLayoutInput+hiddenNumInput+_elements;
    }
}

function modifyFormElements(_what,howMany,_parent){
    //default numchildren is 4 - hr, h3, p, div
    var childNodes=_parent.childNodes;//how many children does the div contain
    var alreadyExist=childNodes.length-4;//there will always be 4 to start, so subtract these from the total

    var difference=howMany-alreadyExist;//+ for add; - for remove

    var formElements="";
    var dynamicID=_parent.id+"-";

    //var basicElement="<label for='element_"+dynamicID+num+"_type'>Who do you want to contact?</label><select name='element_"+dynamicID+num+"_type' id='element_"+dynamicID+num+"_type' required><option disabled selected value> -- select an option -- </option><option value='text'>Text</option><option value='image'>Image</option></select><br/>";
console.log("right difference?"+difference);

    switch(_what){
        case "add":
            //for(var i=alreadyExist;i<difference;i++){
            for(var i=0;i<howMany;i++){
                var elementID=i+1;
                formElements+="<label for='"+dynamicID+"element_"+elementID+"_type'>Element "+(i+1)+" &ndash; type</label><select name='"+dynamicID+"element_"+elementID+"_type' id='"+dynamicID+"element_"+elementID+"_type' onchange='changeSelector(this)' required><option disabled selected value> -- select an option -- </option><option value='text'>Text</option><option value='file'>Image</option></select><br/>";
                formElements+="<label for='"+dynamicID+"element_"+elementID+"_content'>Element "+(i+1)+" &ndash; content</label><input name='"+dynamicID+"element_"+elementID+"_content' id='"+dynamicID+"element_"+elementID+"_content' required>";
            }
        break;
        case "remove":
            console.log("remove how many?"+(alreadyExist-howMany));
        break;
        default:
        //do nothing
    }
    return formElements;
}

function changeSelector(node){
    var matchingElement=node.id.substring(0,node.id.length-4)
    var _content=document.getElementById(matchingElement+"content");
    _content.setAttribute('type', node.value);
}

/**
--2.2--
For: uognd-cms-product-details.php form validation
Comments: these are general form functions    
**/
function cancelForm(){
    //go back to previous page without saving
    window.history.back();
}
/**--END SECTION 2--**/



/**
--SECTION 3.1--
Comments: RAW JS for adding/removing classnames to class list of element
    Basically check if it already has the class name in it, then add/remove
    as necessary
**/
function hasClass(el, className) {
    if (el.classList)
    return el.classList.contains(className)
    else
    return !!el.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'))
}

function addClass(el, className) {
    if (el.classList)
    el.classList.add(className)
    else if (!hasClass(el, className)) el.className += " " + className
}

function removeClass(el, className) {
    if (el.classList)
    el.classList.remove(className)
    else if (hasClass(el, className)) {
    var reg = new RegExp('(\\s|^)' + className + '(\\s|$)')
    el.className=el.className.replace(reg, '')
    }
}
/**--END SECTION 3.1--**/