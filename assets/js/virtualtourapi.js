const rootUrl = "http://uarizona.us1.to/"; // "https://localhost:7033/";

async function getNeighborhoodDetails(neighborhoodId, successFunction) {
    new Ajax.Request(`${rootUrl}neighborhood/${neighborhoodId}`, {
        method: 'get',
        onSuccess: successFunction,
        onFailure: function () {
            alert('Server error retrieving neighborhood details.');
        }
    });
}

async function getSite(siteId, successFunction) {
    new Ajax.Request(`${rootU}site/${siteId}`, {
        method: 'get',
        onSuccess: successFunction,
        onFailure: function () {
            alert('Server error retrieving site details.');
        }
    });
}