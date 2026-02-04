<?php
require_once 'config/db.php';
include 'includes/partials/header.php';
include 'includes/partials/sidebar.php';

// Fetch Basic Stats
$prop_count = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM properties"), 0, 0);
$tenant_count = pg_fetch_result(pg_query($conn, "SELECT COUNT(*) FROM tenants"), 0, 0);
$revenue = pg_fetch_result(pg_query($conn, "SELECT SUM(rent_amount) FROM properties WHERE status='Occupied'"), 0, 0);
?>

<div class="dashboard-header" style="margin-bottom: 2rem;">
    <h1 style="font-size: 2.5rem;">Management Overview</h1>
    <p style="color: hsl(var(--text-muted));">Real-time property and occupancy insights.</p>
</div>

<div class="grid grid-cols-3">
    <div class="glass-card stat-card">
        <div class="stat-icon" style="background: hsl(var(--primary) / 0.1); color: hsl(var(--primary));">
            <i class="bi bi-building"></i>
        </div>
        <span class="stat-label">Properties</span>
        <span class="stat-value"><?php echo $prop_count; ?></span>
    </div>

    <div class="glass-card stat-card">
        <div class="stat-icon" style="background: hsl(var(--success) / 0.1); color: hsl(var(--success));">
            <i class="bi bi-currency-dollar"></i>
        </div>
        <span class="stat-label">Monthly Revenue</span>
        <span class="stat-value">$<?php echo number_format($revenue ?: 0, 2); ?></span>
    </div>

    <div class="glass-card stat-card">
        <div class="stat-icon" style="background: hsl(var(--secondary) / 0.1); color: hsl(var(--secondary));">
            <i class="bi bi-person-check"></i>
        </div>
        <span class="stat-label">Active Tenants</span>
        <span class="stat-value"><?php echo $tenant_count; ?></span>
    </div>
</div>

<div class="glass-card" style="margin-top: 2rem; padding: 2rem;">
    <h3>Recent Property Activity</h3>
    <p style="color: var(--text-muted);">Quick view of the latest listings.</p>
</div>

<?php
echo "</main></div>"; // Close main and sidebar flex
include 'includes/partials/footer.php';
?>