@extends('templates.template')

@section('content')

<h1 class="text-center">API - Sales</h1>
<h3 class="text-center">Vendas - Vendedor <span class="vendedor-id">{{$id_vendedor}}</span></h2>
<div class="col-8 m-auto">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Vendedor</th>
        <th scope="col">Email</th>
        <th scope="col">Comissão</th>
        <th scope="col">Valor</th>
        <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
    </table>
</div>

<script type="text/javascript">
(function() {
    var httpRequest;

    function makeRequest(url) {
        console.log(url)
        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
        try {
            httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
            httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch (e) {}
        }
        }

        if (!httpRequest) {
        alert('Giving up :( Cannot create an XMLHTTP instance');
        return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('GET', url);
        httpRequest.send();
    }

    function alertContents() {
        if (httpRequest.readyState === 4) {
        if (httpRequest.status === 200) {
            var response = JSON.parse(httpRequest.responseText);
            console.log(response);
            let tbody = document.querySelector('.table tbody');
            for( var i in response){
                console.log(response[i].email);
                console.log(response[i].nome);
                let tr = document.createElement('tr');
                let th = document.createElement('th');
                th.setAttribute("scope",'row');
                th.append(response[i].id);
                let td1 = document.createElement('td');
                td1.append(response[i].nome);
                let td2 = document.createElement('td');
                td2.append(response[i].email);
                let td3 = document.createElement('td');
                td3.append('R$ ' + response[i].comissao);
                let td4 = document.createElement('td');
                td4.append('R$ ' + response[i].valor);
                let td5 = document.createElement('td');
                td5.append(response[i].created_at);
                tr.append(th,td1,td2,td3,td4,td5);
                tbody.append(tr);
            }
        } else {
            alert('There was a problem with the request.');
        }
        }
    }
    let id_vendedor = document.querySelector('.vendedor-id').innerText;
    makeRequest('/api/venda/vendedor/'+ id_vendedor);

})();
</script>
@endsection