<?php
include 'check_admin.php';
include 'db_connect.php';

// Merr te gjitha mesazhet
$kontakt = pg_query($conn, "SELECT * FROM KONTAKT ORDER BY KON_DATA DESC");

// Merr te gjitha rezervimet
$rezervim = pg_query($conn, "SELECT * FROM REZERVIM ORDER BY REZ_REGJ DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - PatioTime</title>

    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }

        body { 
            font-family: Georgia, serif; 
            background: #f5f5f5; 
        }
        
        .topbar {
            background: #111;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 { 
            font-size: 24px; 
            color: #f45d01; 
        }

        .admin-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .admin-info span {
            color: #ccc;
        }

        .logout-btn {
            color: white;
            background: #f45d01;
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #d94f00;
        }
        
        .container { 
            max-width: 1200px; 
            margin: 40px auto; 
            padding: 0 20px; 
        }
        
        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #111;
            border-left: 4px solid #f45d01;
            padding-left: 15px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            margin-bottom: 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        th {
            background: #f45d01;
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-size: 14px;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            font-size: 14px;
            color: #333;
        }
        
        tr:hover { 
            background: #fff8f5; 
        }
        
        .badge {
            background: #f45d01;
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #999;
            font-size: 16px;
        }
    </style>
</head>

<body>

<div class="topbar">
    <h1>🍽️ PatioTime — Admin Panel</h1>

    <div class="admin-info">
        <span>Mirësevini, Admin!</span>
        <a href="logout.php" class="logout-btn">Dil</a>
    </div>
</div>

<div class="container">

    <!-- MESAZHET E KONTAKTIT -->
    <h2>📩 Mesazhet e Kontaktit</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Subjekti</th>
                <th>Mesazhi</th>
                <th>Data</th>
            </tr>
        </thead>

        <tbody>
            <?php if (pg_num_rows($kontakt) > 0): ?>
                <?php while ($row = pg_fetch_assoc($kontakt)): ?>
                    <tr>
                        <td><span class="badge"><?= htmlspecialchars($row['kon_id']) ?></span></td>
                        <td><?= htmlspecialchars($row['kon_em']) ?></td>
                        <td><?= htmlspecialchars($row['kon_mb']) ?></td>
                        <td><?= htmlspecialchars($row['kon_tel']) ?></td>
                        <td><?= htmlspecialchars($row['kon_ema']) ?></td>
                        <td><?= htmlspecialchars($row['kon_sub']) ?></td>
                        <td><?= htmlspecialchars($row['kon_mes']) ?></td>
                        <td><?= htmlspecialchars($row['kon_data']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="empty">Nuk ka mesazhe ende!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- REZERVIMET -->
    <h2>📅 Rezervimet</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Telefon</th>
                <th>Email</th>
                <th>Persona</th>
                <th>Data</th>
                <th>Ora</th>
                <th>Regjistruar</th>
            </tr>
        </thead>

        <tbody>
            <?php if (pg_num_rows($rezervim) > 0): ?>
                <?php while ($row = pg_fetch_assoc($rezervim)): ?>
                    <tr>
                        <td><span class="badge"><?= htmlspecialchars($row['rez_id']) ?></span></td>
                        <td><?= htmlspecialchars($row['rez_em']) ?></td>
                        <td><?= htmlspecialchars($row['rez_mb']) ?></td>
                        <td><?= htmlspecialchars($row['rez_tel']) ?></td>
                        <td><?= htmlspecialchars($row['rez_ema']) ?></td>
                        <td><?= htmlspecialchars($row['rez_persona']) ?> persona</td>
                        <td><?= htmlspecialchars($row['rez_data']) ?></td>
                        <td><?= htmlspecialchars($row['rez_ora']) ?></td>
                        <td><?= htmlspecialchars($row['rez_regj']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="empty">Nuk ka rezervime ende!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>