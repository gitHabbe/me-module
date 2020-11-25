---
views:
    kursrepo:
        region: sidebar-right
        template: anax/v2/block/default
        data:
            meta: 
                type: single
                route: block/om-kursrepo

    redovisa:
        region: sidebar-right
        template: anax/v2/block/default
        data:
            meta: 
                type: single
                route: block/om-redovisa
---
###Docs for location api


<p>API can be found via <a href="api/location">/api/location</a></p>
<p>Example 1: <a href="api/location?loc=sundsvall">/api/location?loc=sundsvall</a></p>
<p>Example 2: <a href="api/location?loc=göteborg">/api/location?loc=göteborg</a></p>
<p>Example 3: <a href="api/location?loc=asdfgh">/api/location?loc=asdfg</a></p>