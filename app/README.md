# App directory
This directory contains our app logic.

**config.php** this is our app config file. We can set in all our app general config like(database config or server config).

**core/database/models.php** this file provide some functions to manage the logic under our database actions like(database table object insertion, update or deletion ).

**core/controllers** this folder contains our logical instructions that we run behind our requests(views) like(login or register).


**core/utils/** contains our app utils files.

**core/utils/methods.php** contains our app utils features like(download, upload or slug generator).

**core/utils/router.php** this file contains all our app routes. It helps us to dispatch the routes and call the suitable controller.

**core/views/** this folder contains our app views (User interface).


The **json** directory contains  our json responses files.

The **media** directory contains our app media like (user uploaded files).


<pre>
├── config.php
├── core
│   ├── controllers
│   ├── database
|   |   └── models.php
│   └── views
├── json
├── media
└── README.md
</pre>