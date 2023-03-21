$battleship_grid = [
   ["miss", "miss", "miss", "miss"],
   ["miss", "miss", "miss", "hit"],
   ["miss", "miss", "miss", "hit"],
   ["miss", "miss", "miss", "hit"],
];

// Coordinates to sink my battleship
echo "{$battleship_grid[1][3]},"
     . "{$battleship_grid[2][3]},"
     . "{$battleship_grid[3][3]}";