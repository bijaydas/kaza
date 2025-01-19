const ExpenseGraphs = {
  expenseByYear: () => {
    let yearExpenseChart;
    
    function yearExpense(amounts, categories, forYear) {
      const ctx = document.getElementById('yearExpenses');
      const config = {
        type: 'line',
        options: {
          animation: true,
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              display: true,
            },
            title: {
              display: true,
              text: `Year ${forYear}`
            }
          }
        },
        data: {
          datasets: [
            {
              label: '# Expenses by year',
              data: amounts,
            },
          ],
          
          labels: categories
        },
      };
      
      if (yearExpenseChart) {
        yearExpenseChart.destroy();
      }
      yearExpenseChart = new Chart(ctx, config);
    }
    
    document.addEventListener('livewire:init', () => {
      Livewire.on('backend-updated', (event) => {
        
        if (event.length < 1) return null;
        
        const { data, forYear } = event[0];
        
        if (! data || data.length < 1) return null;
        
        const amounts = [];
        const categories = [];
        
        data.forEach((row) => {
          categories.push(row['category'])
          amounts.push(row['amount'])
        });
        
        yearExpense(amounts, categories, forYear)
      });
    });
  },
};

export default ExpenseGraphs;
