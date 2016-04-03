# Databases and Information Systems
# Challenges of the Digital Age
# System Analysis and Programming

This material was all covered after the midterm. The emphasis is on enterprise systems for all 3 of these topics. These notes are largely taken from the text: Using Information Technology by Williams and Sawyer.

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

Note* Image http://vccsystem.eu/wp-content/uploads/2014/04/Administrator-baz-danych_small.jpg

### Ensures the database's:
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

Note* image https://msdn.microsoft.com/dynimg/IC136050.jpeg

Data mining is the computer-assisted process of sifting through and analyzing vast amounts of data to extract hidden patterns and meaning and to discover new knowledge.

Data is fed into a data warehouse through the following steps, also known as extract, transform and load (ETL):

* Identify and connect to data sources
* Perform data fusion and data cleansing
* Obtain both data and metadata (data about the data)
* Transport data and metadata to the data warehouse
* Data warehouse is a special database of cleaned-up data and metadata.

## An Information System Is

![Porter's Value Chain](https://rhildred.github.io/courses/MB115/Michael_Porter's_Value_Chain.svg "Porter's Value Chain")

This picture is taken from Michael Porter's Value chain, with headings to match your text.

###Most organizations have 5 or more departments within which information must flow, horizontally:
* Research and development
* Production (operations)
* Marketing and sales
* Accounting and finance
* Human resources (personnel)
* Information systems (IS)

An information system is a combination of people, hardware, software, communication devices, and databases that processes data and information for a specific purpose.

What are the qualities of good information?

* Correct and verifiable
* Complete yet concise
* Cost effective
* Current
* Accessible

## Information also flows vertically

![levels of management](https://rhildred.github.io/courses/MB115/mba-managment-information-system-9-728.png "levels of management")

Besides the 6 departments, many organizations also have 3 levels of management, where information flows vertically:

### Strategic-level management
* Top managers (CEOs, COOs, CFOs, CIOs) concerned with long-term, or strategic, planning and decisions

### Tactical-level management
* Middle level managers who make tactical decisions to implement the strategic goals set for the organization

### Operational-level management
* Low-level supervisors who make daily operational decisions

All levels of management are supported to different degrees by the different types of **Computer-based information systems**: information systems that are a combination of hardware, software, and telecommunications networks that people build and use to collect, create, and distribute data.

* Office information systems
* Transaction processing systems
* Management information systems
* Decision support systems
* Executive support systems
* Expert systems

# Security is a system for protecting information technology

![Security](https://static5.businessinsider.com/image/52713e67ecad04535c96e32e/leaked-slide-shows-nsa-celebrated-victory-over-googles-security-with-a-smiley-face.jpg "Security")

Picture from http://static5.businessinsider.com/image/52713e67ecad04535c96e32e/leaked-slide-shows-nsa-celebrated-victory-over-googles-security-with-a-smiley-face.jpg

Security is a system of safeguards for protecting information technology against disasters, system failures, and unauthorized access that can result in damage or loss.

### Computer security's five components:
* Deterrents to computer crime
* Identification and access
* Encryption
* Protection of software and data
* Disaster recovery plans

## Security deals with the following problems:

Databases: Concerns about Privacy & Identity Theft
* Databases have facilitated loss of privacy and identity theft, which have become significant concerns for many people.

### Errors, Accidents, & Natural Hazards
* Human errors
    * Humans often are not good at assessing their own information
    * Human emotions affect performance; people get frustrated
    * Human perceptions are slower than the equipment
    * Information overload may also be a problem
* Procedural errors
    * When people fail to follow established procedures, errors can occur
* Software errors
    * Software bug: an error in a program that causes it not to work properly
* "Dirty data" problems
    * Incomplete, outdated, or otherwise inaccurate data
* Electromechanical problems
    * Mechanical systems can wear out or become damaged
    * They can also be badly designed or constructed
    * Power failures and surges can damage equipment
* Natural hazards can lead to disasters
* Environmental Problems
    * Manufacturing computers and circuits can cause pollution
    * Hazardous toxins are involved in computer manufacture
    * Wireless devices can interfere in hospital activities and with medical devices
    * Used computers/monitors contain chromium, cadmium, lead, mercury, PVC, and brominated flame retardants – all toxic substances that must be disposed of properly
    * Visual pollution (“blight”) is created by the forest of wireless towers, roof antennas, satellite dishes, etc.; birds and bats, other wildlife, and vegetation are affected
    * Nanotechnology carries possible risks on the molecular level

## Systems Development Lifecycle:

![SDLC](https://rhildred.github.io/courses/MB215/sdlc.svg "SDLC")

1. Preliminary investigation
2. Systems analysis
3. Systems design
4. Systems development
5. Systems implementation
6. Systems maintenance

Information systems are frequently revised and upgrade
* Steps in the cycle often overlap

### Preliminary Investigation

1. Conduct preliminary analysis. This
includes stating the objectives,
defining the nature and scope of
the problem.
2. Propose alternative solutions:
leave system alone, make it more
efficient, or build a new system.
3. Describe costs and benefits of
each solution.
4. Submit a preliminary plan with
recommendations.

### Systems Analysis


1. Gather data, using tools of
 written documents, inter-
 views, questionnaires, and
 observations.
2. Analyze the data, using
 modeling tools: grid charts,
 decision tables, data flow
 diagrams, systems flow-
 charts, connectivity
 diagrams.
3. Write a report.

### Systems Design

1. Do a preliminary design, using
 CASE tools, prototyping tools,
 and project management software, among others.
2. Do a detail design, defining
 requirements for output, input,
 storage, and processing and
 system controls and backup.
3. Write a report.

### Systems Development

1. Develop or acquire the development
 software.
2. Acquire the hardware.
3. Test the system.

### Systems Implementation


1. Convert hardware, software,
 and files through one of four
 types of conversions: direct,
 parallel, phased, or pilot.
    * Direct implementation: This means that the user simply stops using the
    old system and starts using the new one. The risk of this method should be
    evident: What if the new system doesn’t work? If the old system has truly
    been discontinued, there is nothing to fall back on.
    * Parallel implementation: This means that the old and new systems are
    operated side by side until the new system has shown it is reliable, at which
    time the old system is discontinued. Obviously there are benefits in taking
    this cautious approach. If the new system fails, the organization can switch
    back to the old one. The difficulty with this method is the expense of paying
    for the equipment and people to keep two systems going at the same time.
    * Phased implementation: This means that parts of the new system are
    phased in separately ... either at different times (parallel) or all at once in
    groups (direct).
    * Pilot implementation: This means that the entire system is tried out,
    but only by some users. Once the reliability has been proved, the system can be introduced to more users until it is progressively "rolled out" to the entire population.
2. Train the users.

### Systems Maintenance

**Phase 6**, systems maintenance, adjusts and improves the system by having
system audits and periodic evaluations and by making changes based on
new conditions. Even with the conversion accomplished
and the users trained, the system won't just run itself. There is a sixth and
continuous phase in which the information system must be monitored to
ensure that it is successful. Maintenance includes not only keeping the machinery
running but also updating and upgrading the system to keep pace with new
products, services, customers, government regulations, and other requirements.
After some time, maintenance costs will accelerate as attempts continue to
keep the system responsive to user needs. 

At some point, these maintenance costs become excessive, indicating that it may be time to start the entire SDLC
again.

## Systems Development Can Result in Programming

![Programming](https://rhildred.github.io/courses/MB215/Waterfall_model.svg "Programming")

A program is a list of instructions that the computer must follow to process data into information.
Programming is done during phase 4 of the SDLC.

The five steps:
1. Clarify/define the problem
2. Design a solution
3. Code the program
4. Test the program
5. Document and maintain the program

**Documentation** is written descriptions of what a program is and how to fix it; should be done through all 5 steps

* User documentation – for the people who will use the program (e.g., user manual – hardcopy or CD, and online)
* Operator documentation – for the computer operators, so they know what to do if the program or hardware malfunctions
* Programmer documentation – for the next programmer who must modify and maintain what has been written
* Maintain the program – keep everything in working condition

## Coding is done using the 3 basic control structures

!["Control Structures"](https://docs.oracle.com/cd/A87860_01/doc/appdev.817/a77069/03_strua.gif "control structures")

We looked at these in some detail in the lecture.
