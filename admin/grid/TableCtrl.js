/*
\
|*| Version : 0.92
|*| Author  : Chaitanya Yinti
|*| Contact : yinti@users.sourceforge.net
|*| WebSite : http://dhtmlgrid.sourceforge.net/
|*|
|*| Feel free to use this script under the terms of the GNU General Public
|*| License, as long as you do not remove or alter this notice.
\*/

	/************************************
*\
	|       Start of Config Param         |
	\*************************************/
	

// Color used for hilighting a selected row
	
var clrHilight = '#ffffff';

	
// Set this to false if you want 'click to select' and
	
// 'doubleclick to Edit' mode
	
var blnPointToSelect = true;

	
// Full path of the blank image used to hide the sort images 
	
var strBlankImage = "blank.gif";

	
// Full path of the up image used on sort asc
	
var strUpImage = "up.gif";	

	
// Full path of the up image used on sort des
	
var strDownImage = "down.gif";

	
// The width of the images used to indicate the asc/des sort
	
var intImgWidth = 12;

	
// The height of the images used to indicate the asc/des sort
	
var intImgHeight = 13;	
	

/*************************************\
	|           End of Config Param       |
	\*************************************/

	/*************************************\
	|           Globals start             |
	\*************************************/

	// Stores the last used object during sort
	


var objLastClick = -1;

	
// Stores the text being edited
	var txtOld = "";

	
// Stores the total table width
	
var intTotalWidth = 0;

	
// Stores the flag used by capturemouse
	
var blnMouseOver = false;	

	
// Stores the div being moved
	
var objDivToMove = null;

	
// Stores the number of coloumns; initialized in init ()
	
var intColCount = 0;

	
// Stores the row element currently selected
	
var objRowSelected = null;

	
//THE element which holds the table... 
	
var element = null;
	

/*************************************\
	|           Globals end               |
	\*************************************/

	/*********************TODO*****************************\
	 prototype setCapture/releaseCapture PROPERLY
	 Get rid of isIE, isNS4 completely ...
	 Extend keycapture to navigate the table on up/down arrow
	 Fix escape/unescape on text change
	\******************************************************/
		
	/*\
	|*| The entry point. This will 
	|*|		Attache all the appropriate functions to the table
	|*|		Call function to create the IMG elems used during the sorting
	|*|		call function to init the DIV elems that are used for moving
	|*|		call function to init the DIV elems used for about box
	\*/
	

function init(tableName)
 {
		
//Handle all javascript errors 
		
window.onerror = handleError;

		
isIE = (navigator.appVersion.indexOf ("MSIE") != -1);
		
isNS4 = (document.layers) ? true : false;
		
isNS6 = (!document.layers) && (navigator.userAgent.indexOf ('Netscape')!=-1);

		
if ((isNS4) && (!isNS6)) 
alert ("Currently only supports NN 6 and above");

		
if (document.getElementById)

element = document.getElementById(tableName);
		
else	
//TODO: Need to test this piece of code still. Happens only in NN4 so far 
			
eval (element = "document." + tableName);

		
if (element == null)

return alert ("Error: Not able to get table element ");
if (element.tagName != 'TABLE')

return alert ("Error: Not able to control element " + element.tagName);

		
initNNFunctions ();

		
if (blnPointToSelect) {
			
element.attachEvent ('onmouseover', selectRow);
			
element.attachEvent('onclick', onClickCell);
		
}
		
else
		
{
			
element.attachEvent('onclick', selectRow);
			
element.attachEvent ('ondblclick', onClickCell);
		
}

		document.attachEvent ('onkeydown' , captureDelKey);

		
//Need this fix for IE only .. so element.focus is stubbed in NN
		
element.focus ();
	
		
initSortImages ();
		
initDiv ();
		
initAbout ();
	
}



	/*\
	|*| This function removes the textnodes from the table rows.
	|*| This cleanup work is needed to get rid of the EXTRA textnodes that NN gives
	\*/



function removeTextNodes (t)
 {
		
for (var i = 0; t.childNodes[i] ; i++) {
			
if (!t.childNodes[i].tagName) {
				
t.childNodes[i].parentNode.removeChild (t.childNodes[i]);
			
}
			
else
			
{
				
for (var j = 0; t.childNodes[i].childNodes[j] ; j++) {
if(!t.childNodes[i].childNodes[j].tagName)
t.childNodes[i].childNodes[j].parentNode.removeChild (t.childNodes[i].childNodes[j]);
				
}
			
}
		
}


}

	

/*\
	|*| This function adds the blank images to the head row of the table
	\*/
	

function initSortImages () {

if (!element.tHead) return;

removeTextNodes (element.tHead);
		
var theadrow = element.tHead.childNodes[0]; 
//Assume just one Head row

		
if (isIE) theadrow.style.cursor = "hand";
	
else 
theadrow.style.cursor = "pointer";

		
removeTextNodes (theadrow.parentNode);
		
intColCount = theadrow.childNodes.length;

		
for (var i = 0; i < intColCount; i++) {
			
objImg = document.createElement ("IMG");
objImg.setAttribute ("src", strBlankImage);

objImg.setAttribute ("id", "srtImg" + i);
objImg.setAttribute ("width", intImgWidth);
objImg.setAttribute ("height", intImgHeight);
objImg.setAttribute ("align", "right");
objImg.setAttribute ("valign", "middle");

objImg.setAttribute ("border", 0);

clickCell = theadrow.childNodes[i];

clickCell.selectIndex = i;
			
clickCell.insertAdjacentElement ("afterBegin", objImg);

clickCell.style.width = clickCell.width;
		
}

}



	/*\
	|*| This will only be called once during initIALIZATION
	|*| This will create the DIV elems at the end of each col and
	|*| attach all the functions needed to resize the coloumns
	\*/
	

function initDiv ()
{
		
var objLast = element, objDiv;
		
removeTextNodes (element.tBodies[0]);

		
for (var i = 1; i <= intColCount; i++)
{	
			
objDiv = document.createElement ("DIV");
	
objDiv.setAttribute ('id', "DragMark" + (i - 1));
			
objDiv.setAttribute ('name',  i);	
//Used to track the TDs that have to be moved
			
objDiv.style.position = "absolute";
			
objDiv.style.top = 0; 

			
var objTD = element.tHead.childNodes[0].childNodes[i - 1];
			
if(!objTD || objTD.tagName != "TD") return;

			
var intColWidth = (getRealPos (objTD) - 0) + (objTD.width - 0);

			
objDiv.style.left = intColWidth - 3 ;
			
objDiv.style.width = 6 + parseInt(element.border);
			
objDiv.style.height = (element.tBodies[0].childNodes.length + 1) * objTD.offsetHeight;
			
// for debugging only
			
//objDiv.style.backgroundColor = clrHilight;
			
			
//To make it more beautiful in IE 6	
			
if(navigator.appVersion.indexOf ("MSIE 6.0") != -1)
				
objDiv.style.cursor = "col-resize";
		else
				
objDiv.style.cursor = "crosshair";

			
objDiv.attachEvent('onmouseover', flagTrue);
			
objDiv.attachEvent ('onmousedown', captureMouse);
			
objDiv.attachEvent ('onmousemove', resizeColoumn);
			
objDiv.attachEvent ('onmouseup', releaseMouse);
		
objDiv.attachEvent ('onmouseout', flagFalse);

			
objLast.insertAdjacentElement ("afterEnd", objDiv);
	
objLast = objDiv;
		
}
	
}



	/*\
	|*| This function will be fired onmouseover of the DIVs
	|*| Set the flag to true indicating that the mouse is over the DIV
	\*/
	

function flagTrue(){
		
blnMouseOver = true;
	
}

	

/*\
	|*| This function will be fired onmousedown on the DIVs
	|*| Capture all the mosue events if mousedown is fired inside the DIV
	\*/
	

function captureMouse()
	{
		
if (blnMouseOver){
			
objDivToMove = window.event.srcElement;
			
objDivToMove.setCapture ();
		
}

	
}



	/*\
	|*| This function will be fired onmousemove of the DIVs
	|*| This will be used as a ondrag function... thanks to IE 5
	\*/
	

/*
function resizeColoumn () 
{
		
//If mouse button is down, objDivToMove will be valid... we can move/resize
		
if (!objDivToMove) return;

		
var intTDNum = objDivToMove.name - 1;
		
var thead = element.tHead;

		
if (!thead) return;

		
var objTD = thead.childNodes[0].childNodes[intTDNum];

	
if (!objTD || objTD.tagName != "TD") return;

		
var intCurWidth = objTD.offsetWidth;
		
var newX = window.event.clientX;
		
//var newX = window.event.x;
		
var intNewWidth = newX - objTD.offsetLeft;

		
//TODO: who decided that the minimum col widhth is 50px?
		
//if (intNewWidth < 50) return;
		
//Check to see if the table widht is more than the width of the window
		
//Need that 20px buffer in IE to prevent scroll bars from appearing
		

if(element.document.body.offsetWidth - 20 < element.offsetWidth - intCurWidth + intNewWidth) return;



objTD.style.width = intNewWidth;
var objDiv = objDivToMove;

//Will be ± 1 depending on which side the mouse moved
		
//will be used to move all the DIVs remaining on the right
		

var intDivMove = newX - objDiv.offsetLeft;
		
objDiv.style.left = newX;

		

//Move all the remaining DIVs on the right
		
for (var i = 1; i < intColCount - intTDNum; i++)
 {
objDiv = objDiv.nextSibling;
			
objDiv.style.left = objDiv.offsetLeft + intDivMove ;
		
}
	
}
*/



	/*\
	|*| This function will be fired onmouseup
	|*| Release all the mouse events of the DIV
	\*/


function releaseMouse()
	{
objDivToMove.releaseCapture ();

objDivToMove = null;
	
}



	/*\
	|*| This function will be fired onmouseout of the DIV
	|*| Set the flag indicating that the mouse is NOT over the DIV
	\*/
	


function flagFalse ()
{
		
blnMouseOver = false;
	
}

	

/*\
	|*| This function will be called once during initIALIZATION
	|*| This will create DIV elm after the table to display the ABOUT informationA
	\*/
	

function initAbout ()
{
		
objDiv = window.document.createElement ("DIV");
		
objDiv.id = "About";
		
objDiv.style.position = "absolute";
		
objDiv.style.top = 0; 
		
objDiv.style.left = 0 ;
		
objDiv.align = "center";
		
//element.document.body.offsetWidth ==> width of the IFRAME in IE
		
objDiv.style.width = element.document.body.offsetWidth;
		
objDiv.style.height = element.document.body.offsetHeight;
		
objDiv.style.backgroundColor = "#0000FF";
		
objDiv.style.color = "#FFFF00";
		
objDiv.style.visibility = "hidden";
		
objDiv.insertAdjacentText ("afterBegin", "DHTML Grid ver 0.92\n\n" + "");

		
var objInput = document.createElement ("INPUT");
		
objInput.id = "cmdAbout";
		
objInput.title = "Ok";
		
objInput.value = "Ok";
		
objInput.align = "center";
		
objInput.valign = "middle";
		
objInput.style.height = "20px";
		
objInput.style.width = "102px";
		
objInput.type = "button";
		
objInput.attachEvent ("onclick", about);

		
objDiv.insertAdjacentElement ("beforeEnd", objInput);
		
element.insertAdjacentElement ("afterEnd", objDiv);
	
}

	

/*\
	|*| Hilights the row on mouseover. This also sets the "previous row selected" to normal
	\*/
	

function selectRow ()
	{
		
var srcElem = getEventRow ();

		
if (srcElem.tagName != "TR") return;
		
if (objRowSelected)
{
			
objRowSelected.style.backgroundColor = '';
			
objRowSelected = null;
		
}
		
if (srcElem.rowIndex > 0)
{
			
srcElem.style.backgroundColor = clrHilight;

objRowSelected = srcElem;
		
}
		
element.focus ();
	
}

	

/*\
	|*| Entry point for all the click events on the table
	\*/
	

function onClickCell ()
	{
		
var srcElem = getEventRow ();

		
if(srcElem.tagName != "TR") return;
		
if (srcElem.rowIndex == 0) sort ();
		
else 
//onEdit ();
	
return false;
}

	

/*\
	|*| Capture the key press event, on del key see if a row is selected and delete
	\*/
	

function captureDelKey ()
{
		
var keyPressed = event.keyCode;
		
		
var srcElem = window.event.srcElement;
		
if ((keyPressed == 46) && (srcElem.tagName != "INPUT") && (objRowSelected))
{
			
deleteRow (objRowSelected.rowIndex - 1);
			
objRowSelected = null;
		
}
	
}

	

/*\
	|*| detach all the events attached to the element and call other cleanup functions
	\*/


function cleanup ()
{
		
element.detachEvent ('onmouseover', selectRow);
		
element.detachEvent ('onclick', onClickCell);
		
cleanupDiv ();
	
cleanupAbout ();
	
}

	

/*\
	|*| Used by cleanup to clean the DIVs created for moving the Cols
	|*| detach all the events and delete the elements here
	\*/
	

function cleanupDiv ()
	{
		
var objDiv;
		
for (var i = 1; i <= intColCount; i++)
{	
		
objDiv = element.document.getElementById ("DragMark" + (i - 1));
			
objDiv.detachEvent ('onmouseover', flagTrue);
			
objDiv.detachEvent ('onmousedown', captureMouse);
			
objDiv.detachEvent ('onmousemove', resizeColoumn);
			
objDiv.detachEvent ('onmouseup', releaseMouse);
			
objDiv.detachEvent ('onmouseout', flagFalse);
			
objDiv.removeNode (true);
		
}
	
}

	

/*\
	|*| Detach all the events and Delete the elms related to the about box here
	\*/
	

function cleanupAbout ()
{
		
element.document.getElementById ("About").removeNode (true);
	
}

	

/*\
	|*| This is THE function which does all the real sorting of the rows
	|*| First get rid of all the text-node elements that NN returns for spaces in the tables
	|*| then sort the contents based on which coloumn is clicked
	\*/


function insertionSort (t, iRowEnd, fReverse, iColumn)
	{
		
var textRowInsert, textRowCurrent, eRowInsert, eRowWalk;
		
removeTextNodes (t);
		
for (var iRowInsert = 1 ; iRowInsert <= iRowEnd ; iRowInsert++)
	{
			
if (iColumn)
{
			
if (typeof (t.childNodes[iRowInsert].childNodes[iColumn]) != "undefined")

textRowInsert = t.childNodes[iRowInsert].childNodes[iColumn].innerText;
	
else
					
textRowInsert = "";
			
}
			
else
			
{
				
textRowInsert = t.childNodes[iRowInsert].innerText;
			
}

			
for (var iRowWalk = 0 ; iRowWalk < iRowInsert ; iRowWalk++){
				
if (iColumn)
{
					
if (typeof (t.childNodes[iRowWalk].childNodes[iColumn]) != "undefined")
textRowCurrent = t.childNodes[iRowWalk].childNodes[iColumn].innerText;
					
else
	
textRowCurrent = "";
				
}
				
else
				
{
					
textRowCurrent = t.childNodes[iRowWalk].innerText;
				
}
				
if ((!fReverse && textRowInsert < textRowCurrent) || (fReverse && textRowInsert > textRowCurrent))
{
				
eRowInsert = t.childNodes[iRowInsert];
					
eRowWalk = t.childNodes[iRowWalk];
					
t.insertBefore (eRowInsert, eRowWalk);
					
iRowWalk = iRowInsert; // done
				
}
			
}
		
}
	
}

	

/*\
	|*|	This function is called when there is a click event on the top
	|*|	row
	\*/
	

function sort ()
{
		
var srcElem = getEventCell ();
		
if (srcElem.tagName != "TD") return;

		
var thead = element.tHead;	
		
// clear the sort images in the head
		
var imgcol = thead.getElementsByTagName ("IMG");
		
for (var x = 0; x < imgcol.length; x++) 
{
			
imgcol[x].setAttribute('src', strBlankImage);
		
}

		
if (objLastClick == srcElem.selectIndex)
{
		
if (reverse == false)
{
				
srcElem.childNodes[0].setAttribute ('src', strDownImage);
				
reverse = true;
			
}
			
else 
			
{
				
srcElem.childNodes[0].setAttribute ('src', strUpImage);
				
reverse = false;
			
}
	
}
		
else
		
{
			
reverse = false;
			
objLastClick = srcElem.selectIndex;
			
srcElem.childNodes[0].setAttribute ('arc', strUpImage);

		
}
		
tbody = element.tBodies [0];
		
insertionSort (tbody, tbody.rows.length-1, reverse, srcElem.selectIndex);
	
}

	

/*\
	|*| This function is called when focus is lost on the text box
	|*| that is used to read user input. Validate the contents of the
	|*| input box and write them back to the table cell
	\*/
	

function focusLost ()
	{
		
var objSrcElm = window.event.srcElement; 
		
objSrcElm.parentNode.innerHTML = unescape (objSrcElm.value);

}

	

/*\
	|*| This function is called when user clicks on a cell other than
	|*| the top row.
	|*| Show the content of the cell in an input box
	\*/


function onEdit ()
{
		
var srcElem = getEventCell ();
		
		
if (srcElem.tagName != "TD") return;
		
if (srcElem.firstChild && srcElem.firstChild.tagName == "INPUT") return;
		
		
txtOld = srcElem.innerHTML;
		
srcElem.innerHTML = ""; 

		
var objInput = document.createElement ("INPUT");
		
objInput.style.width = "";//srcElem.clientWidth;
		
objInput.type = "text";
		
objInput.value = "" + escape (txtOld);
		
//objInput.attachEvent ("onfocusout", focusLost);
		
//the above onfocusout works fine in IE 6 but not in IE 5 so...
		
objInput.attachEvent ("onblur", focusLost);
		
objInput.attachEvent ("onkeypress", checkForEnter);

		
srcElem.insertAdjacentElement ("beforeEnd", objInput);

		
objInput.select ();
	
}

	

/*\
	|*| This function is used to add a row at the end of the tabl
	|*| Once the rows are added it calls the function to change the height
	|*|  of the DIVs that are used for resizing the table.
	\*/


function addRow ()
{
		
var objTR = document.createElement ("TR");
		
var objTD = document.createElement ("TD");

		
for (var i = 0; i < addRow.arguments.length; i++) 
{
			
objTD = document.createElement ("TD");
			
objTD.appendChild (document.createTextNode ((arguments[i]=="")?"null":arguments[i]));
			objTR.insertAdjacentElement ("beforeEnd", objTD);
		
}

		
objTBody = element.tBodies [0];
		
objTBody.insertAdjacentElement ("beforeEnd", objTR);

		
resizeDivs ();
	
}
	

	

/*\
	|*| The function deletes the last row by calling the deleteRow function 
	|*|  with the table row count
	\*/

	
function deleteLastRow ()
{
		
removeTextNodes (element.tBodies[0]);
		
this.deleteRow (element.tBodies[0].childNodes.length - 1);
	
}

	

/*\
	|*| The function checks if the rownum passed is a valid row 
	|*|  and deletes it 
	|*| This also calls the resizeDivs function to reduce the height
	|*|  of the DIVs that are used in resizing the table
	\*/


	
function deleteRow (rowNum)
{
		
var tbody = element.tBodies [0];
		
if (!tbody || rowNum < 0) return;

		
removeTextNodes (tbody);
		
tbody.childNodes[rowNum].removeNode (true);
		
resizeDivs ();
	
}

	

/*\
	|*| This will be called on everkeypress event of the input box
	|*| This raises the focuslost event if the user hits enter
	\*/
	

function checkForEnter ()
{
		
if (event.keyCode == 13) focusLost ();
	
}

	

/*\
	|*| Toggle the About div section
	\*/
	

function about ()
{
		
if (element.document.getElementById ("About").style.visibility == "hidden")
			element.document.getElementById ("About").style.visibility = "visible";
		
else
			
element.document.getElementById ("About").style.visibility = "hidden";
	
}

	

/*\
	|*| Need this as IE 5 doesnt give the offsetLeft property properly
	\*/
	

function getRealPos (elm)
{
		
intPos = 0;
		
elm = elm.previousSibling;
		
while ((elm!= null) && (elm.tagName!="BODY"))
{
	 		
intPos += elm.width - 0;
			
elm = elm.previousSibling;
		
}
		
return intPos;
	
}

	

/*\
	|*| Return the TR elem on which an event has fireed
	\*/
	

function getEventRow ()
	{
		
var srcElem = window.event.srcElement;
		
//crawl up to find the row
		
while (srcElem.tagName != "TR" && srcElem.tagName != "TABLE")
{
			
srcElem = srcElem.parentNode;
		
}
		
return srcElem;
	
}

	

/*\
	|*| Return the TD elem on which an event has fireed
	\*/
	

function getEventCell ()
{
		
var srcElem = window.event.srcElement;
		
//crawl up the tree to find the table col
		
while (srcElem.tagName != "TD" && srcElem.tagName != "TABLE")
{
			
srcElem = srcElem.parentNode;
		
}
		
return srcElem;
	
}

	

/*\
	|*| This funtion is used to change the height of the DIVs that are used to drag the cols
	|*| Used when a row is added or deleted.
	\*/
	

function resizeDivs ()
	{
		
for (var i = 0; i < intColCount; i++)
{	
			
var objDiv = element.document.getElementById ("DragMark" + (i));
			
var objTD = element.tHead.childNodes[0].childNodes[i];

			
if ((!objDiv) || (!objTD) || (objTD.tagName != "TD")) return;
			
objDiv.style.height = (element.tBodies[0].childNodes.length + 1) * (objTD.offsetHeight - 1);
		
}
	
}

	

/*\
	|*| Function to handle erros. Displayes a request to contact along with the error messagei, filename and line
	\*/

	
function handleError (err, url, line)
	{
		
//alert ('');
		 
return true; 
}


/*\
	|*| Function to prototype all the functions needed by NN to emulate the functionality of IE
	\*/


function initNNFunctions ()
	{
		
if ((self.Node) && (self.Node.prototype))
{
			
Node.prototype.removeNode = NNRemoveNode;

			
Element.prototype.insertAdjacentText = NNInsertAdjacentText;
	
Element.prototype.insertAdjacentElement = NNInsertAdjacentElement;
			
Element.prototype.insert__Adj = NNInsertAdj;
			
Element.prototype.attachEvent = NNAttachEvent;
			
Element.prototype.detachEvent = NNDetachEvent;
			
Element.prototype.setCapture = NNSetCapture;
			
Element.prototype.releaseCapture = NNReleaseCapture;
		
Element.prototype.__defineGetter__('document', NNDocumentGetter);

			
HTMLElement.prototype.focus = NNNullFunction;
			
HTMLElement.prototype.attachEvent = NNAttachEvent;
		
HTMLElement.prototype.detachEvent = NNDetachEvent;
	
HTMLElement.prototype.__defineGetter__('innerText', NNInnerTextGetter);
			
HTMLElement.prototype.__defineSetter__('innerText', NNInnerTextSetter);

			
HTMLDocument.prototype.attachEvent = NNAttachEvent;
			
HTMLDocument.prototype.detachEvent = NNDetachEvent;

			
Event.prototype.__defineGetter__('keyCode', NNKeyCodeGetter);
		
}
	
}

	

/*\
	|*|
	\*/
	

function NNRemoveNode (a1)
{
		
var p = this.parentNode;
		
if (p&&!a1)
{
			
var df = document.createDocumentFragment ();
			
for (var a = 0; a < this.childNodes.length; a++)
{
				
df.appendChild (this.childNodes[a])
			
}
			
p.insertBefore (df , this)
		
}
		
return p?p.removeChild (this):this;
	
}

	

/*\
	|*|
	\*/
	
function NNInsertAdjacentText (a1 , a2)
	{
		
var t = document.createTextNode (a2||"")
		
this.insert__Adj (a1 , t);
	
}

	

/*\
	|*|
	\*/
	

function NNInsertAdjacentElement (a1 , a2)
{
		
this.insert__Adj (a1 , a2);
		
return a2;
	
}

	

/*\
	|*|
	\*/
	

function NNInsertAdj (a1 , a2)
	{
	
var p = this.parentNode;
		
var s = a1.toLowerCase ();
	
if (s == "beforebegin") {
p.insertBefore (a2 , this)
}
		
if (s == "afterend"){
p.insertBefore (a2 , this.nextSibling)
}
		
if (s == "afterbegin"){
this.insertBefore (a2 , this.childNodes[0])
}
		
if (s == "beforeend"){
this.appendChild (a2)
}
	
}

	

/*\
	|*| Fuction to simulate attachEvent
	\*/
	

function NNAttachEvent (strEvent, funcHandle)
	{
		
var shortTypeName = strEvent.replace (/on/, "");
		
funcHandle._ieEmuEventHandler = function (e)
{
		
window.event = e;
			
window.event.srcElement = e.target;
			
return funcHandle ();
	};
		
this.addEventListener (shortTypeName, funcHandle._ieEmuEventHandler, false);
	
}

	

/*\
	|*| Fuction to simulate detachEvent
	\*/
	

function NNDetachEvent (strEvent, funcHandle)
	{
		
var shortTypeName = strEvent.replace (/on/, "");
		
if (typeof funcHandle._ieEmuEventHandler == "function")
			
this.removeEventListener (shortTypeName, funcHandle._ieEmuEventHandler, false);
		
else 
			
this.removeEventListener (shortTypeName, funcHandle, true);
	
}

	

/*\
	|*| A HUGE HACK to getaway with the lack of setcapture in NN
	\*/
	

function NNSetCapture ()
{
	
//TODO: FIX THIS FIRST BEFORE ANYTHING ELSE!! MAJOR HACK FOR NOW
		
document.attachEvent ('onmousemove', resizeColoumn);
		
document.attachEvent('onmouseup', releaseMouse);
	
}

	

/*\
	|*| A HUGE HACK to getaway with the lack of releasecapture in NN
	\*/
	

function NNReleaseCapture ()
{
		
//TODO: FIX THIS SECOND THEN GO TO EVERYTHING ELSE! 
		
document.detachEvent ('onmousemove', resizeColoumn);
		
document.detachEvent ('onmouseup', releaseMouse);
	
}

	
/*\
	|*| Empty function used to remove any functions not needed in NN
	\*/
	

function NNNullFunction () { /*Nothing here*/ 
}

	

/*\
	|*| return the innerhtml by replacing all the <TAGNAME> from the string
	\*/
	

function NNInnerTextGetter ()
	{
		
return this.innerHTML.replace (/<[^>]+>/g,"");
	
}

	

/*\
	|*| Add the text as a textnode to the element
	\*/
	

function NNInnerTextSetter (txtStr)
{
		
var parsedText = document.createTextNode (txtStr);
		
this.innerHTML = "";
		
this.appendChild (parsedText);
	
}

	

/*\
	|*| Function to simulate event.keyCode
	\*/
	

function NNKeyCodeGetter ()
{
		
return this.which;
	
}

	
/*\
	|*| Function to simulate element.document
	\*/
	
function NNDocumentGetter ()
{
		
return this.ownerDocument;
	
}

