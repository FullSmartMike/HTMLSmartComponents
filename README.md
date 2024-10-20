# HTMLSmartComponents

Develop smart frontend components without using any frontend framework.


<h2 id="table">Table of Contents</h2>

+ [Advantages](#advantages)
+ [What It Is](#what-it-is)
+ [How It Works](#how-it-works)
+ [How To Use It](#how-to-use-it)
+ [Nested HTMLSmartComponents](#nested)


<h2 id="advantages">Advantages</h2>

+ It works in any context where you can use HTML code.
+ You don't need to use a frontend framework.
+ Keeps your component logic in only one place.
+ Keeps your component logic encapsulated.
+ It's too easy to use and too fast to learn.
+ It's compatible with any web technology.
+ It can access the full power of web technologies.

[Table of Contents](#table)


<h2 id="what-it-is">What It Is</h2>

HTMLSmartComponents are a new frontend web programming way that allows you to work with frontend components symply by using HTML, CSS and JavaScript.

Unlike frontend frameworks, HTMLSmartComponents don't alter the way web technologies works. Instead, it uses these tecnologies directly and are therefore fully compatible with all their features. Thanks to that, frontend developers can regain the freedom and power that comes from using directly HTML, CSS and JavaScript.

[Table of Contents](#table)


<h2 id="how-it-works">How It Works</h2>

An HTMLSmartComponent is primarily defined by a block-level HTML element that acts as a wrapper for the component. Inside this wrapper you can place the structure, style and behavior of your component without worrying about anything outside the wrapper, simply your HTMLSmartComponent always will be able to work just as you desgined.

To learn how to use an HTMLSmartComponent continue reading.

[Table of Contents](#table)


<h2 id="how-to-use">How To Use</h2>

To use an HTMLSmartComponent you need to:

+ ### Create a wrapper for the HTMLSmartComponent:

    First you have to use a block-level HTML element that serves as a wrapper for the HTMLSmartComponent. Also, this wrapper element needs to set its id attribute. For example, you can use a generic `<div>` element:

    ```html
    <div id="myID">
    </div>
    ```

+ ### Conceptually divide the body of the component:

    Now, you can conceptually divide the component in three sections: Structure, Style and Behavior.

    ```html
    <div id="myID">

        <!-- Structure -->

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

+ ### Make the Structure of the HTMLSmartComponent:

    The Structure section also can be conceptually divide in two possible sections: Main and Auxiliary.

    ```html
    <div id="myID">

        <!-- Structure -->
            <!-- Main Structure -->
            <!-- Auxiliary Structure -->

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

    In the Main section you can use any HTML element you want. For example, you can use an `<h1>` title element:

    ```html
    <div id="myID">

        <!-- Structure -->
            <!-- Main Structure -->
            <h1>HTMLSmartComponent</h1>

            <!-- Auxiliary Structure -->

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

    The Auxiliary section is intended to be made up of zero or more `<template>` elements. Inside each `<template>` you can place a piece of structure that you won't need initially but you will need to load later with JavaScript. For example, you can place a `<p>` element:

    ```html
    <div id="myID">

        <!-- Structure -->
            <!-- Main Structure -->
            <h1>HTMLSmartComponent</h1>

            <!-- Auxiliary Structure -->
            <template>
                <p>It works!</p>
            </template>

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

    (!!!) Main and Auxiliary Structures never should be mixed, each one must be an independent block of code.

+ ### Define the Styles of the HTMLSmartComponent:

    To define the Styles of the component you can use an `<style>` HTML element. The CSS rules you place inside this element must always start with the **id** value of the wrapper element to avoid style collisions with other components:

    ```html
    <div id="myID">
        <h1>HTMLSmartComponent</h1>

        <template>
            <p>It works!</p>
        </template>

        <!-- Style -->
        <style>
            #myID1 > h1 {
                padding: 20px;
                background-color: darkorchid;
                color: white;
            }
        </style>

        <!-- Behavior -->

    </div>
    ```

    (!!!) Use the appropiate CSS combinators (e.g. >) to select the exact elements that you want to style.

+ ### Code the Behavior of the HTMLSmartComponent:

    Finally, to code the behavior of the HTMLSmartComponent you can use a `<script>` HTML element. Although the final JS code you use is up to you, you should always place it inside an arrow function that executes to herself inmediatly:

    ```html
    <div id="myID">
        <h1>HTMLSmartComponent</h1>

        <template>
            <p>It works!</p>
        </template>

        <style>
            #myID1 > h1 {
                padding: 20px;
                background-color: darkorchid;
                color: white;
            }
        </style>

        <!-- Behavior -->
        <script>
            (() => {

                // Your JS code goes here

            })()
        </script>
    </div>
    ```

    (!!!) If you don`t place your JS code inside a fuction, your code could collide with other JS code.

    For example, in the `<script>` element, you can take the code inside the `<template>` and inject it at the end of the main structure as follows:

    ```html
    <div id="myID">
        <h1>HTMLSmartComponent</h1>

        <template>
            <p>It works!</p>
        </template>

        <style>
            #myID > h1 {
                padding: 20px;
                background-color: darkorchid;
                color: white;
            }
        </style>

        <script>
            (() => {
                const component = document.querySelector('#myID');
                const template = document.querySelector('#myID > template');

                const copy = template.content.cloneNode(true);
                component.insertBefore(copy, template);
            })()
        </script>
    </div>
    ```

    That's all, now you can use HTMLSmartComponents in any place that you can use HTML code without using any frontend framework and without colliding with any other code. All works perfectly!

[Table of Contents](#table)


<h2 id="nested">Nested HTMLSmartComponents</h2>

To nest an HTMLSmartComponent inside another you only need to place it in the structure section of the parent:

```html
<div id="myID1">
    <h1>HTMLSmartComponents</h1>
    <div id="myID2">
        <h2>A new way to program components in HTML</h2>

        <template>
            <p>It works!</p>
        </template>

        <style>
            #myID2 > h2 {
                margin: 80px 0px 70px 0px;
                color: darkslategray;
                font-size: 24pt;
            }
        </style>

        <script>
            (() => {
                const component = document.querySelector('#myID2');
                const template = document.querySelector('#myID2 > template');

                const copy = template.content.cloneNode(true);
                component.insertBefore(copy, template);
            })()
        </script>
    </div>

    <template>
        <p>Obviously, it works!</p>
    </template>

    <style>
        #myID1 > h1 {
            padding: 20px;
            background-color: darkorchid;
            color: white;
        }
    </style>

    <script>
        (() => {
            const component = document.querySelector('#myID1');
            const template = document.querySelector('#myID1 > template');

            const copy = template.content.cloneNode(true);
            component.insertBefore(copy, template);
        })()
    </script>
</div>
```

[Table of Contents](#table)