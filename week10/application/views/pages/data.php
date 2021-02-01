<div class="container">
    <table id="myTable" class="table table-stripped table-bordered display">
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Salary</th>
            <th>No.Telepon</th>
            <th>Alamat</th>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Agung W Chandranata</td>
                <td>Trainer</td>
                <td>Rp. 2.100.000</td>
                <td>087883505580</td>
                <td>Newton Timur No.28</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ryan Pramana</td>
                <td>Trainer</td>
                <td>Rp. 700.000</td>
                <td>087883606680</td>
                <td>Newton Barat No.29</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Johannes Immanuel</td>
                <td>Trainer</td>
                <td>Rp. 1.400.000</td>
                <td>082883626682</td>
                <td>Newton Utara No.12</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Monica Devi Kristiadi</td>
                <td>Trainer</td>
                <td>Rp. 2.800.000</td>
                <td>087443606640</td>
                <td>Newton Selatan No.1</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Wendy</td>
                <td>Coordinator</td>
                <td>Rp. 5.700.000</td>
                <td>0812139927805</td>
                <td>Newton Pusat No.14</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>