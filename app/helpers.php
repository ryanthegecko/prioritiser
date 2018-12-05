<?php

function getCalculatedArmValue($value){
  switch ($value){
      case 1:
          return 1;
          break;
      case 2:
          return 3;
          break;
      case 3:
          return 7;
          break;
      case 4:
          return 15;
          break;
  }
}


function getCalculatedArmValueReverse($value){
  switch ($value){
      case 1:
          return 1;
          break;
      case 3:
          return 2;
          break;
      case 7:
          return 3;
          break;
      case 15:
          return 4;
          break;
  }
}
