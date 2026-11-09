<?php declare(strict_types=1); ?>
<?php switch ($icon):
    case 'gamepad': ?>
        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M7 6h10c3 0 6 10 4 12-2 2-5-2-6-3H9c-1 1-4 5-6 3C1 16 4 6 7 6Zm0 3v2H5v2h2v2h2v-2h2v-2H9V9Zm9 1v2h2v-2Zm2 3v2h2v-2Z"/></svg>
        <?php break;
    case 'target': ?>
        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false"><circle cx="12" cy="12" r="8" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/><path d="M12 1v5m0 12v5M1 12h5m12 0h5" fill="none" stroke="currentColor" stroke-width="2"/></svg>
        <?php break;
    case 'arrow-up': ?>
        <span aria-hidden="true">↑</span>
        <?php break;
endswitch; ?>
