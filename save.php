<?php

/*
 
The request comes in as POST so that we can maintain characters like newlines, etc. PHP receives
an array because of the serialization, which you can immediate through.

If you want, you can just store this serialized string to a single database field with a hash or
some security and the just unserialize it. No need to create dynamic tables or anything.

 */

print_r($_POST);

/*

	Array
(
    [ul] => Array
        (
            [0] => Array
                (
                    [class] => input_text
                    [required] => false
                    [values] => Name
                )

            [1] => Array
                (
                    [class] => input_text
                    [required] => true
                    [values] => E-mail Address?
                )

            [2] => Array
                (
                    [class] => checkbox
                    [required] => false
                    [title] => Choose any:
                    [values] => Array
                        (
                            [2] => Array
                                (
                                    [value] => PHP
                                    [default] => true
                                )

                            [3] => Array
                                (
                                    [value] => jQuery
                                    [default] => true
                                )

                            [4] => Array
                                (
                                    [value] => XML
                                    [default] => true
                                )

                            [5] => Array
                                (
                                    [value] => Aspen
                                    [default] => false
                                )
                        )
                )
            [3] => Array
                (
                    [class] => radio
                    [required] => true
                    [title] => Choose one:
                    [values] => Array
                        (
                            [2] => Array
                                (
                                    [value] => Yes
                                    [default] => true
                                )

                            [3] => Array
                                (
                                    [value] => No
                                    [default] => false
                                )
                        )
                )
        )
)
*/

?>