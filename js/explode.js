/*RGL 2014-02-28*/

/** Constant - Number of total squares in the grid. **/
var TAM_GRID=16;
/** Constant - Margin between squares. **/
var SQ_MARGIN=1;
/** Constant - Square width. **/
var SQ_WIDTH=80;
/** Constant - Number of different colors. **/
var NUM_OF_COLORS=3;
/** Constant - Number of grid's columns. **/
var COLS=4;
/** Constant - Number of starting moves. **/
var STARTING_NUM_OF_MOVES=10;


function indexToRow(index,numOfCols){
	return Math.floor(index/numOfCols);	
}	
	
function indexToCol(index,numOfCols){
	return Math.floor(index%COLS);
}	

			
var getClassFromColor = { //object with properties emulating switch-case conditional structure
	1: function() {return "blue";},
	2: function() {return "green";},
	3: function() {return "yellow";}
};		

//////////////////////////////////////////////////////////////////////
//the Square Constructor - it returns an object with index and color
function Square(index, color){
	this.index = index;
	this.color = color;
}

//////////////////////////////////////////////////////////////////////
// --getBackgroundColor: returs black or grey for each position of
// the grid to simulate a chess board-like pattern
function getBackgroundColor(row, i){
	var squareBackground;
	if( Math.floor(row%2)===0 ){
		squareBackground = Math.floor(i%2)===0?"black":"grey";
	} else {
		squareBackground = Math.floor(i%2)===0?"grey":"black";
	}
	return squareBackground;
}