<?php

class PeopleCollection
{
    public static array $peopleCollection = [

        ['id'=>1, 'email'=>'ivan@mail.com', 'name'=>'Ivan'],
        ['id'=>2, 'email'=>'vadym@mail.com', 'name'=>'Vadym'],
        ['id'=>3, 'email'=>'masha@mail.com', 'name'=>'Masha'],

        ];


    public static function checkEmail($checkEmail): bool
    {
        foreach ( PeopleCollection::$peopleCollection  as $item => $value)
        {
            if ($checkEmail == $value['email'])
            {
                return true;
            }
        }
        return false;
    }

}


//var_dump(PeopleCollection::getEmail('masha@mail.com'));