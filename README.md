# lightweight_framework

This is a framework that I am trying to build.

I do not intend to integrate any popular module into it
and it is meant to be a learning experience that will
take me through probably most common design and performance issues
people go up against when building an mvc framework.

By the end of this I do intend to make it safe enough
to be used for a blog site or other things of that scale.

 Update: Recently I have been reading on Hack and HHVM and this project may either fork into a Hack one, that version being the main, and this one following behind it.

 As of Nov 19 '18 the user created models map to database tables without providing anything more other than the table name as the class name and the existing columns as class properties.

 More information regarding the implementation of this mechanism can be seen in the code at the moment and when this project will near completion I will write a wiki in which I describe my classes, their methods and what they return.

 Between the BaseModel and PDO_conn_* more matching methods will be created providing basic functionality for database operations.
  - BaseModel matches to the db_type and file and calls the appropriate methods of the file which contains the database operation queries and logic. 
