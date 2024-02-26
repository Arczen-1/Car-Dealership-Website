<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Aligned Search Bar</title>
<style>
  body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: #eceff1;
  }
  .search-wrapper {
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    background: white;
    padding: 20px;
    width: fit-content;
  }
  .search-labels {
    display: flex;
    margin-bottom: 5px;
  }
  .search-label {
    font-size: 12px;
    color: #5f6368;
    margin-right: 10px; /* Adjust spacing based on design requirements */
    white-space: nowrap;
  }
  .search-inputs {
    display: flex;
  }
  .search-input {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 14px;
    color: #5f6368;
    outline: none;
    margin-right: 10px; /* Adjust spacing based on design requirements */
    border-radius: 4px;
    flex-grow: 1;
  }
  .search-button {
    background-color: #1a73e8;
    border: none;
    color: white;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    outline: none;
    border-radius: 4px;
    white-space: nowrap;
  }
  .search-button:hover {
    background-color: #185abc;
  }
  /* Ensure button stays aligned to the right */
  .flex-grow {
    flex-grow: 1;
  }
</style>
</head>
<body>

<div class="search-wrapper">
  <div class="search-labels">
    <label for="car-input" class="search-label">Car, model, or brand</label>
    <label for="payment-input" class="search-label">Max. monthly payment</label>
    <label for="year-input" class="search-label">Make Year</label>
    <div class="flex-grow"></div> <!-- Spacer to push the button to the right -->
  </div>
  <div class="search-inputs">
    <input id="car-input" class="search-input" type="text" placeholder="What car are you looking for?" aria-label="Car, model, or brand">
    <input id="payment-input" class="search-input" type="text" placeholder="Add an amount in $" aria-label="Max. monthly payment">
    <input id="year-input" class="search-input" type="text" placeholder="Add a minimal make year" aria-label="Make Year">
    <button class="search-button" type="button">SEARCH</button>
  </div>
</div>

</body>
</html>
