import Alpine from 'alpinejs';

Alpine.start();

import ExpenseGraphs from "./expense-graph.js";

(() => {
  ExpenseGraphs.expenseByYear();
})();
