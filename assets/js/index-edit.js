const neighborhoodId = 1; // TODO: We are only supporting West University as of now, so we will use a default id

async function onLoad() {
    // Load the random neighborhood details
    getNeighborhoodDetails(neighborhoodId, onGetNeighborhoodDetailsSuccess);
}

async function onGetNeighborhoodDetailsSuccess(response) {
    if (200 == response.status) {
        var neighborhood = response.responseJSON;

        // Set the neighborhood image
        var image = neighborhood.neighborhoodImage;
        var imageElement = document.getElementById('image_neighborhood');
        imageElement.src = image.url;
        imageElement.alt = image.description;

        // Set the external web links
        var linkFacebook = document.getElementById('link_facebook');
        linkFacebook.setAttribute('href', neighborhood.facebookLink);
        linkFacebook.setAttribute('target', '_blank');

        var linkInstagram = document.getElementById('link_instagram');
        linkInstagram.setAttribute('href', neighborhood.instagramLink);
        linkInstagram.setAttribute('target', '_blank');

        // Set the cards
        var siteLinks = neighborhood.siteLinkList.siteLinks;
        var divSiteCards = document.getElementById('site_cards');

        for (let i = 0; i < siteLinks.length; i++) {
            var siteLink = siteLinks[i];

            // Add the card body section
            var divCardBody = document.createElement('div');
            divCardBody.classList.add('card-body');

            var headerTitle= document.createElement('h5');
            headerTitle.classList.add('card-title');
            headerTitle.innerHTML = siteLink.name;

            var paragraphDescription = document.createElement('p');
            paragraphDescription.classList.add('card-text');
            paragraphDescription.innerHTML = siteLink.shortDescription;

            var divLink = document.createElement('div');
            divLink.classList.add('read-more');

            var italicLink = document.createElement('i');
            italicLink.classList.add('bi');
            italicLink.classList.add('bi-arrow-right');

            var linkReadMore = document.createElement('a');
            linkReadMore.setAttribute('href', '#');
            linkReadMore.appendChild(italicLink);
            linkReadMore.innerHTML += ' Read More';

            divLink.appendChild(linkReadMore);

            divCardBody.appendChild(headerTitle);
            divCardBody.appendChild(paragraphDescription);
            divCardBody.appendChild(divLink);

            // Add the card section
            var divCard = document.createElement('div');
            divCard.classList.add('card');
            divCard.classList.add('h-100');

            var image = document.createElement('img');
            image.classList.add('card-img-top');
            image.setAttribute('src', siteLink.displayImage.url);
            image.setAttribute('alt', siteLink.displayImage.description);

            divCard.appendChild(image);
            divCard.appendChild(divCardBody);

            // Add the main card section
            var divCardSection = document.createElement('div');
            divCardSection.classList.add('col');
            divCardSection.setAttribute('data-aos', 'fade-up');

            divCardSection.appendChild(divCard);
            divSiteCards.appendChild(divCardSection);
        }
    }
    else {
        alert(`Error state ${response.status} while retrieving neighborhood details.`);
    }
}
