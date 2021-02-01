API_KEY = "8c54e9e9366789a5d38c369b9294f913"
baseURL = "https://api.themoviedb.org/3/"

/*Data Module--------------------------------------
-------------------------------------------------*/
let appData = angular.module('data', [])



/*Data Controller----------------------------------
-------------------------------------------------*/
appData.controller('DataController', ['$scope', '$window', 'dataServices', 'detailServices', 'requestServices', function($scope, $window, dataServices, detailServices, requestServices) {
    $scope.username = ''
    $scope.configData = ''
    
    $scope.newMovie = dataServices.movie
    $scope.movies = []

    $scope.recordMovie = dataServices.movie

    //fetch config--------------------------------------------------
    requestServices.getConfig(baseURL).then(function(response) {
        $scope.configData = response.data
        console.log($scope.configData)
    })
    //END OF fetch config--------------------------------------------------


    //Fetch now playing movies--------------------------------------------------
    angular.element(document).ready(function() {
        $scope.username = dataServices.getCookie("username")
        if(!dataServices.isValidUser($scope.username)){
            alert("You are not a valid user")
            $window.location.href="/login.html"
        }
        
        else {
            requestServices.getMovies(baseURL).then(function(response) {
                dataServices.addMovies(response, $scope)
            })
        }
    })
    //END OF Fetch now playing movies--------------------------------------------------


    $scope.logout = function() {
        dataServices.setCookie("username", "", 100)
        localStorage.removeItem("recordMovie")

        $window.location.href = '/login.html'
    }

    $scope.setRecordClick = function(movie) {
        detailServices.setRecordMovie(movie)
        $window.location.href = "/detail.html"
    }
}])



/*Detail Controller----------------------------------------
-----------------------------------------------------------*/
appData.controller('DetailController', ['$scope', '$window', 'dataServices', 'detailServices', 'requestServices', function($scope, $window, dataServices, detailServices, requestServices) {
    $scope.movieDetails = ''
    $scope.configData = ''

    $scope.configVideos = ''
    $scope.videos = []

    $scope.movieCredits = ''
    $scope.casts = []


    $scope.username = dataServices.getCookie("username")
    $scope.recordMovie = JSON.parse(detailServices.getRecordMovie())


    //fetch config--------------------------------------------------
    requestServices.getConfig(baseURL).then(function(response) {
        $scope.configData = response.data
        console.log($scope.configData)
    })
    //END OF fetch config--------------------------------------------------


    //Verifying User--------------------------------------------------
    angular.element(document).ready(function() {
        $scope.username = dataServices.getCookie("username")
        if(!dataServices.isValidUser($scope.username)){
            alert("You are not a valid user")
            $window.location.href="/login.html"
        }
        
        else {
            requestServices.getMovieDetails(baseURL, $scope.recordMovie).then(function(response) {
                detailServices.addMovieDetails(response, $scope)

                console.log("Movie Details is below")
                console.log($scope.movieDetails)
            })
        }
    })
    //END OF Verifying User--------------------------------------------------


    //Initialize Page--------------------------------------------------
    $scope.initialize = function() {
        //Get Videos
        requestServices.getVideos(baseURL, $scope.recordMovie.id).then(function(response) {
            //Inisialisasi awal
            $scope.configVideos = ''
            $scope.videos = []

            $scope.configVideos = response.data

            console.log("FROM HERE")
            console.log($scope.configVideos.results)
            for(var i = 0; i < $scope.configVideos.results.length; i++) {
                $scope.videos.push("https://www.youtube.com/embed/" + $scope.configVideos.results[i].key)
            }
            console.log($scope.videos)
        })
        //END OF Get Videos


        //Get Cast
        requestServices.getMovieCredits(baseURL, $scope.recordMovie.id).then(function(response) {
            detailServices.addMovieCredits(response, $scope)

            console.log("Cast is below")
            console.log($scope.casts)
        })
        //END OF Get Cast 
    }
    //END OF Initialize Page--------------------------------------------------


    $scope.logout = function() {
        dataServices.setCookie("username", "", 100)
        localStorage.removeItem("recordMovie")

        $window.location.href = '/login.html'
    }

    $scope.initialize()
}])



/*Home Controller----------------------------------------
-----------------------------------------------------------*/
appData.controller('HomeController', ['$scope', '$window', 'dataServices', 'detailServices', 'homeServices', 'requestServices', function($scope, $window, dataServices, detailServices, homeServices, requestServices) {
    $scope.username = ''
    $scope.configData = ''
    $scope.configVideos = ''

    $scope.popularMovies = []
    $scope.trailer = ''
    $scope.modalBody = ''

    $scope.newMovie = dataServices.movie
    $scope.movies = []

    $scope.recordMovie = dataServices.movie

    //fetch config--------------------------------------------------
    requestServices.getConfig(baseURL).then(function(response) {
        $scope.configData = response.data
        console.log($scope.configData)
    })
    //END OF fetch config--------------------------------------------------


    //Verifying User--------------------------------------------------
    $scope.initialize = function() {
        $scope.username = dataServices.getCookie("username")

        if(!dataServices.isValidUser($scope.username)){
            alert("You are not a valid user")
            $window.location.href="/login.html"
        }

        else {
            requestServices.getPopular(baseURL).then(function(response) {
                homeServices.addpopularMovies(response, $scope)
            })
        }
    }
    //Verifying User--------------------------------------------------


    $scope.logout = function() {
        dataServices.setCookie("username", "", 100)
        localStorage.removeItem("recordMovie")

        $window.location.href = '/login.html'
    }

    $scope.getTrailer = function(movie_id) {
        requestServices.getVideos(baseURL, movie_id).then(function(response) {
            //Inisialisasi awal
            $scope.configVideos = ''
            $scope.trailer = ''

            $scope.configVideos  = response.data

            if(response.data.results.length <= 0) {
                $scope.modalBody = "Unfortunately, trailer is not available yet"
                console.log($scope.modalBody.length)
            }

            else {
                $scope.trailer = "https://www.youtube.com/embed/" + response.data.results[0].key
                
                homeServices.showVideo(response, $scope)
                //console.log($scope.trailer)

                $scope.modalBody = ''
            }
        })
    }

    $scope.setRecordClick = function(movie) {
        detailServices.setRecordMovie(movie)
        $window.location.href = "/detail.html"
    }

    $scope.initialize()
}])

appData.filter('trusted', ['$sce', function ($sce) {
    return $sce.trustAsResourceUrl;
 }]);



//---------------------------------------------------------------------------------//



/*data services-----------------------------------------------
-----------------------------------------------------------*/
appData.factory('dataServices', ['$http', function($http) {
    var movie = {
        id                  : "",
        backdrop_path       : "",
        poster_path         : "",
        original_language   : "",
        original_title      : "",
        overview            : "",
        popularity          : "",
        release_date        : "",
        title               : "",
        vote_average        : "",
        vote_count          : ""
    }

    var req = ''

    var d = ''
	var expires = ''
	var name = ''
	var ca = []
	var c = ''

    var service = {
        isValidUser: isValidUser,

        setCookie: setCookie,
        getCookie: getCookie,

        addMovies: addMovies,
    }

    return service

    ////////////////////////

    function isValidUser(username) {
        if(username == '') {
            return false
        }

        return true;
    }

    function setCookie(cname, cvalue, cexdays) {
		d = new Date()
		d.setTime(d.getTime() - (cexdays * 24 * 60 * 60 * 1000))
		
		expires = "expires=" + d.toUTCString();

		console.log(expires)
		
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
	}

    function getCookie(cname) {
        name = cname + "="; 
        ca = document.cookie.split(';');

        for(var i = 0; i < ca.length; i++) {
            c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }

            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }

        return "";
    }

    //------------------------------------------------------------//

    function addMovies(response, $scope) {
        req = response.data.results
        console.log(req)

        for(var i = 0; i < req.length; i++) {
            $scope.movies.push({
                id                  : req[i].id, 
                backdrop_path       : $scope.configData.images.base_url + $scope.configData.images.backdrop_sizes[2] + req[i].backdrop_path,
                poster_path         : $scope.configData.images.base_url + $scope.configData.images.poster_sizes[3] + req[i].poster_path,
                original_language   : req[i].original_language,
                original_title      : req[i].original_title,
                overview            : req[i].overview,
                popularity          : req[i].popularity,
                release_date        : req[i].release_date,
                title               : req[i].title,
                vote_average        : req[i].vote_average,
                vote_count          : req[i].vote_count
            })
        }
    }
}])


/*detail services-----------------------------------------------
-----------------------------------------------------------*/
appData.factory('detailServices', ['$http', function($http) {
    var recordMovie = {
        backdrop_path: "",
        poster_path: "",
        original_language: "",
        original_title: "",
        overview: "",
        popularity: "",
        release_date: "",
        title: "",
        vote_average: "",
        vote_count: ""
    }

    var req = ''

    var service = {
        addMovieCredits : addMovieCredits,
        addMovieDetails : addMovieDetails,
        setRecordMovie  : setRecordMovie,
        getRecordMovie  : getRecordMovie
    }

    return service

    ////////////////////////

    function addMovieCredits(response, $scope) {
        req = response.data
        console.log("Below is req for addMovieCredits")
        console.log(req)

        for(var i = 0; i < req.cast.length; i++) {
            $scope.casts.push({
                cast_id : req.cast[i].cast_id,
                character : req.cast[i].character,
                credit_id : req.cast[i].credit_id,
                gender : req.cast[i].gender,
                id : req.cast[i].id,
                name : req.cast[i].name,
                order : req.cast[i].order,
                profile_path : $scope.configData.images.base_url + $scope.configData.images.profile_sizes[1] + req.cast[i].profile_path
            })
        }
    }

    function addMovieDetails(response, $scope) {
        req = response.data
        console.log(req)

        $scope.movieDetails = {
            id                  : req.id,
            title               : req.title,
            release_date        : req.release_date,
            budget              : req.budget,
            homepage            : req.homepage,
            genres              : req.genres,
            tagline             : req.tagline,
            production_companies: req.production_companies
        }

    }

    function setRecordMovie(movie) {
        localStorage.setItem("recordMovie", JSON.stringify(movie))
    }

    function getRecordMovie() {
        recordMovie = localStorage.getItem("recordMovie")

        return recordMovie
    }
}])


/*home services-----------------------------------------------
-----------------------------------------------------------*/
appData.factory('homeServices', ['$http', function($http) {
    var req = ''
    
    var service = {
        addpopularMovies    : addpopularMovies,
        showVideo           : showVideo,
    }

    return service

    ////////////////////////
    
    function addpopularMovies(response, $scope) {
        req = response.data.results
        console.log(req)

        for(var i = 0; i < req.length; i++) {
            if(req[i].backdrop_path === null){
                continue
            }
                

            $scope.popularMovies.push({
                id                  : req[i].id, 
                backdrop_path       : $scope.configData.images.base_url + $scope.configData.images.backdrop_sizes[3] + req[i].backdrop_path,
                poster_path         : $scope.configData.images.base_url + $scope.configData.images.poster_sizes[3] + req[i].poster_path,
                original_language   : req[i].original_language,
                original_title      : req[i].original_title,
                overview            : req[i].overview,
                popularity          : req[i].popularity,
                release_date        : req[i].release_date,
                title               : req[i].title,
                vote_average        : req[i].vote_average,
                vote_count          : req[i].vote_count
            })
        }

        console.log("DOWN HERE")
        console.log($scope.popularMovies)
    }

    function showVideo(response, $scope) {
        var url = $scope.trailer
        
        /* Assign the initially stored url back to the iframe src
        attribute when modal is displayed again */
        $("#myModal").on('show.bs.modal', function(){
            console.log(url)
            $("#trailerVideo").attr('ng-src', url);
            $("#trailerVideo").attr('src', url);
        });
    }
}])


/*request services-----------------------------------------------
-----------------------------------------------------------*/
appData.factory('requestServices', ['$http', function($http) {
    var service = {
        getConfig       : getConfig,
        getMovies       : getMovies,
        getPopular      : getPopular,
        getVideos       : getVideos,
        getMovieDetails : getMovieDetails,
        getMovieCredits : getMovieCredits,

        requestSuccess  : requestSuccess,
        requestFailed   : requestFailed
    }

    return service

    ////////////////////////

    function getConfig(baseURL) {
        return $http.get(baseURL + "configuration?api_key=" + API_KEY)
            .then(requestSuccess)
            .catch(requestFailed)
    }

    function getMovies(baseURL) {
        return $http.get(baseURL + "movie/now_playing?api_key=" + API_KEY + "&language=en-US&page=1")
            .then(requestSuccess)
            .catch(requestFailed)
    }

    function getPopular(baseURL) {
        return $http.get(baseURL + "movie/popular?api_key=" + API_KEY + "&language=en-US&page=1")
            .then(requestSuccess)
            .catch(requestFailed)
    }

    function getVideos(baseURL, movie_id) {
        return $http.get(baseURL + "movie/" + movie_id + "/videos?api_key=" + API_KEY)
            .then(requestSuccess)
            .catch(requestFailed)
    }

    function getMovieDetails(baseURL, recordMovie) {
        return $http.get(baseURL + "movie/" + recordMovie.id + "?api_key=" + API_KEY)
            .then(requestSuccess)
            .catch(requestFailed)
    }

    function getMovieCredits(baseURL, movie_id) {
        return $http.get(baseURL + "movie/" + movie_id + "/credits?api_key=" + API_KEY)
            .then(requestSuccess)
            .catch(requestFailed)
    }

    //------------------------------------------------------------//

    function requestSuccess(response) {
        return response
    }

    function requestFailed(error) {
        console.log(error)
        alert("Error: " + error.status + (" \nStatus Code: " + error.data.status_code + " \n" + error.data.status_message))
    }
}])