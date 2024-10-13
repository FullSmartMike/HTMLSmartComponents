# HTMLSmartComponents
Develop smart frontend components without using any frontend framework.

## How To Use
To use an HTMLSmartComponent you need to:

+ ### Create a wrapper for the HTMLSmartComponent:

    First you have to use a block-level HTML element that serves as a wrapper for the HTMLSmartComponent. Also, this wrapper element needs to set its id attribute. For example, you can use a generic `<div>` element:

    ```
    <div id="myID">
    </div>
    ```

+ ### Conceptually divide the body of the component:

    Now, you can conceptually divide the component in three sections: Structure, Style and Behavior.

    ```
    <div id="myID">

        <!-- Structure -->

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

+ ### Make the Structure of the HTMLSmartComponent:

    The Structure section also can be conceptually divide in two possible sections: Main and Auxiliary.


    ```
    <div id="myID">

        <!-- Structure -->
            <!-- Main Structure -->
            <!-- Auxiliary Structure -->

        <!-- Style -->

        <!-- Behavior -->

    </div>
    ```

    In the Main section you can use any HTML element you want. For example, you can use an `<h1>` title element:

    ```
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

    ```
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

    ```
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

    ```
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

    ```
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

## Nested HTMLSmartComponents
To nest an HTMLSmartComponent inside another you only need to place it in the structure section of the parent:

```
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