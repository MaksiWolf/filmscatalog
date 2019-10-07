<?php
ini_set('error_reporting', 0);
ini_set('display_errors', 0);
?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <style>
        .table_dark {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            font-size: 14px;
            width: 98%;
            text-align: center;
            border-collapse: collapse;
            background: #252F48;
            margin: 10px;
        }
        .table_dark th {
            color: #EDB749;
            border-bottom: 1px solid #37B5A5;
            padding: 12px 17px;
        }
        .table_dark td {
            color: #CAD4D6;
            border-bottom: 1px solid #37B5A5;
            border-right:1px solid #37B5A5;
            padding: 7px 17px;
        }
        .table_dark tr:last-child td {
            border-bottom: none;
        }
        .table_dark td:last-child {
            border-right: none;
        }
        .table_dark tr:hover td {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div ng-app="myApp" ng-controller="myCtrl">

    <table class="table_dark">
        <tr>
            <th>Название</th>
            <th>Год</th>
            <th>Количество оценок</th>
            <th>Рейтинг</th>
        </tr>
        <tr>
            <td><%name0%></td>
            <td><%year0%></td>
            <td><%totalpeople0%></td>
            <td><%rating0%></td>
        </tr>
        <tr>
            <td><%name1%></td>
            <td><%year1%></td>
            <td><%totalpeople1%></td>
            <td><%rating1%></td>
        </tr>
        <tr>
            <td><%name2%></td>
            <td><%year2%></td>
            <td><%totalpeople2%></td>
            <td><%rating2%></td>
        </tr>
        <tr>
            <td><%name3%></td>
            <td><%year3%></td>
            <td><%totalpeople3%></td>
            <td><%rating3%></td>
        </tr>
        <tr>
            <td><%name4%></td>
            <td><%year4%></td>
            <td><%totalpeople3%></td>
            <td><%rating3%></td>
        </tr>
        <tr>
            <td><%name5%></td>
            <td><%year5%></td>
            <td><%totalpeople4%></td>
            <td><%rating4%></td>
        </tr>
        <tr>
            <td><%name6%></td>
            <td><%year6%></td>
            <td><%totalpeople5%></td>
            <td><%rating5%></td>
        </tr>
        <tr>
            <td><%name7%></td>
            <td><%year7%></td>
            <td><%totalpeople6%></td>
            <td><%rating6%></td>
        </tr>
        <tr>
            <td><%name8%></td>
            <td><%year8%></td>
            <td><%totalpeople7%></td>
            <td><%rating7%></td>
        </tr>
        <tr>
            <td><%name9%></td>
            <td><%year9%></td>
            <td><%totalpeople8%></td>
            <td><%rating8%></td>
        </tr>
    </table>

</div>

<script>
    var app = angular.module('myApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    app.controller('myCtrl', function($scope, $http) {
        $http.get("http://localhost/films/public/api/api/comments")
            .then(function(response) {

                var result = response.data;
                for (var i = 0; i <= 9; i++) {
                    $scope['name'+i] = result[i]['namefilm'];
                    $scope['year'+i] = result[i]['year'];
                    $scope['totalpeople'+i] = result[i]['totalpeople'];
                    $scope['rating'+i] = result[i]['rating'];
                }
            });
    });
</script>

</body>
</html>
