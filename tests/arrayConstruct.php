<?php

/**
 * DumpToArray
 *
 * Creates an array constructor from an array.
 *
 * Takes an array, loops through it, and outputs a string that
 * can be copied directly back into code view.  This code will
 * generate the original array.
 *
 * This is useful for generating sample data for OOP Classes
 * to test them independently from the overall system.
 *
 * @author Matthew Osborne
 */

// encouraging programmers to not nest arrays too deep:
define( MAX_NESTING_LEVEL, 6 );
define( NEWLINE, "\n" );
define( INDENT, "    " );

class DumpToArray
{
  /**
   * DumpToArray::dumpArray()
   *
   * Adds the code for the base array and calls subDump()
   *
   * @param array $arr
   * @return string
   */
  function dumpArray( $arr )
  {
    // prevent exceptions later with a helpful error message
    if ( ! is_array($arr) )
      throw new exception( 'DumpToArray($arr) requires an array for an argument!' );

    // let's format it so it's easy to read in the browser
    $return = '<pre>';
    // define a variable for quick copy 'n paste
    $return .= '$arr =' . NEWLINE . 'array' . NEWLINE . '(';
    // dump the contents of the array
    $return .= $this->subDump( $arr );
    // close the array variable
    $return .= NEWLINE . ');';
    // done formatting!
    $return .= "</pre>";
    return $return;
  }

  /**
   * DumpToArray::subDump()
   *
   * Adds code for the contents of the array, including any sub-nested arrays
   *
   * @param array $arr
   * @param integer $countIndents
   * @return string
   */
  private function subDump( $arr, $nestedLevel = 1 )
  {
    // $count is to let us hide the comma for the last var in the array
    $count = 0;
    $indents = "";

    // let's limit the nesting level of the array
    if ( $nestedLevel > MAX_NESTING_LEVEL )
      throw new exception( "DumpToArray::subDump() says Your array has exceeded the limit of " .
        MAX_NESTING_LEVEL . " levels deep.  Please simplify your source code" );
    // let's indent it the correct number of times
    for ( $i = 0; $i < $nestedLevel; $i++ )
      $indents .= INDENT;
    foreach ( $arr as $key => $row )
    {
      if ( $count > 0 )
        $return .= ", ";
      if ( is_array($row) )
        // it's an array .. let's build the array and and its contents

      {
        $return .= NEWLINE . $indents . "'" . $key . "' => ";
        $return .= NEWLINE . $indents . 'array' . NEWLINE . $indents . '(';
        $return .= $this->subDump( $row, $nestedLevel + 1 );
        $return .= NEWLINE . $indents . ')';
      } else
      {
        // not an array; let's just show the value
        $return .= NEWLINE . $indents . "'" . $key . "' => '" . $row . "'";
      }
      $count++;
    }
    return $return;
  }
}

?>