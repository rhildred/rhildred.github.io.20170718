Layers And States
=================

When I tried to build a spritesheet in Fireworks for my Pivot animation I was thwarted because Fireworks wants to build a spritesheet out of slices rather than states. Fair enough! ... but the effort illustrates something about Fireworks.

My animation came into fireworks with one page and a state for each of the 100 .png files exported by pivot. 

* Pages contain states

Each of the states had exactly one layer in it which was the background layer for that step in the animation. For instance `State 27` had the following background layer:

![State 27](images/tumble27.png "State 27")

* States contain layers

but note!!!!: _Deleting a layer from any of the states deletes the layer from all the states._ This for me is counter-intuitive.

* Creating a new state creates a state with the same number of layers as the previous state but they are empty. You duplicate a state to make it have the same layers.

* If you turn off the display of a layer in a state it will be sticky in that the layer element will not be displayed in that state but will continue to be displayed in other states. 

* It can seem that turning off layers that are duplicates leads to disappearing elements.

A more serious problem that has been noticed is that layers can disappear from a state and need to be added back in manually. There is `share layer to states` functionality that may help with this phenomena. From Adobe:

> To share objects in a Layer across states, right-click the layer, and select Share Layer To States. Objects in the layer are shared across states and also to new states when they are created. All objects on the corresponding layer in other states are deleted and replaced with objects from the shared layer. Any modification to objects in the shared layer is reflected across states.  