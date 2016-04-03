# Databases and Information Systems
# Challenges of the Digital Age
# System Analysis and Programming

This material was all covered after the midterm. The emphasis is on enterprise systems for all 3 of these topics.

## Relational Database

![relational database](https://rhildred.github.io/courses/MB115/RelationalDatabase.png "relational database")

A relational database contains tables of related data. The tables have fields that describe what a row in the table represents. Another way that we look at this is that a table (class) contains objects (records) which are described by attributes (fields). In the above case the Driver's license table contains driver's license objects/records described by attributes like `Driver's name`, `Street Address` ....

A key field (primary key) is a special field (or fields) in a record that holds unique data that identifies that record from all the other records in the table and in the database. 

* Often an identifying number, such as social security number or a student ID number.
* Keys are used to sort records in different ways.
* Primary keys must be unique make records distinguishable from one another.
* Foreign keys appear in other tables and usually refer to primary keys in particular tables; they are used to relate one table to another (to cross-reference data).

## 3 Principal Database Components

![database components](https://rhildred.github.io/courses/MB115/DatabaseComponents.svg "database components")

### Data Dictionary
* Repository that stores the data definitions and descriptions of the structure of the data and the database

### DBMS Utilities
* Programs that allow you to maintain the database by creating, editing, deleting data, records, and files
* Also include automated backup and recovery

### Report Generator
* Program for producing on-screen or printed readable documents from all or part of a database

## Database Administrator (DBA)

!["DBA"](https://rhildred.github.io/courses/MB115/Administrator-baz-danych_small.jpg "DBA")

* Coordinates all related activities and needs for an organization’s database
* Generally highly specialized and well paid

### Ensures the database’s:
* Recoverability
* Integrity
* Security
* Availability
* Reliability
* Performance

## Multi Dimensional Database

![Multi Dimensional Database](https://rhildred.github.io/courses/MB115/multidimensionalDatabase.jpeg "Multi Dimensional Database")

* Models data as facts, dimensions, or numerical answers for use in the interactive analysis of large amounts of data for decision-making purposes
* Allows users to ask questions in colloquial language
* Use OLAP (online analytical processing) software to provide answers to complex database queries

Note* image msdn