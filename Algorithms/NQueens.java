public class NQueens
{
   public static void main(String [] args)
   {
      int n = 5;
      char [][] B = 
      {
         {' ',' ',' ',' ',' ', ' '},
         {' ','Q',' ',' ',' ', ' '},
         {' ',' ','Q',' ',' ', ' '},
         {' ',' ',' ',' ','Q', ' '},
         {' ',' ',' ',' ',' ', 'Q'},
         {' ',' ',' ','Q',' ', ' '}
      };
      
      if(validNQueens(n, B))
         System.out.println("This is a valid solution.");
      else
         System.out.println("This is not a valid solution.");
   }
   
   public static boolean validNQueens(int n, char [][] B)
   {
   
      //checking rows and cols for more than one 'Q'
      for(int i = 1; i <= n; i++)
      {
         int numQueensRow = 0;
         int numQueensCol = 0;
         
         for(int j = 1; j <= n; j++)
         {
            if(B[i][j] == 'Q')
            {
             if(numQueensRow == 0)
               numQueensRow++;
             else
               return false;  
            }
            if(B[j][i] == 'Q')
            {
             if(numQueensCol == 0)
               numQueensCol++;
             else
               return false;  
            }
         }
      }
      
      //checking diagonals for more than one 'Q'
      for(int i = 1; i <= n; i++)
      {
         for(int j = 1; j <= n; j++)
         {
            if(B[i][j] == 'Q')
            {
               System.out.println("For node B[" + i + "][" + j + "]," +
               " the program checked the following nodes:");
               for(int k = 1; k < Math.max(i, j); k++)
               {
                  if(k < j)
                  {
                     //check for row attack
                     System.out.print("B[" + i + "][" + k + "] ");
                     if(B[i][k] == 'Q')
                        return false;
                     //check for main diag attack
                     
                     if(k < j)
                     {
                        System.out.print("B[" + (i - k) + "][" + (j - k) + "] ");
                        if(B[i - k][j - k] == 'Q')
                           return false;
                     }
                  }
                  
                  if(k < i)
                  {
                     //check for col attack
                     System.out.print("B[" + k + "][" + j + "] ");
                     if(B[k][j] == 'Q')
                           return false;
                     //check for counterdiag attack
                     if(j + k <= n)
                     {
                        System.out.print("B[" + (i - k) + "][" + (j+ k) + "] ");
                        if(B[i - k][j + k] == 'Q')
                           return false;
                     }
                  }
               }
               System.out.println();
            }
         }
      }
      return true;
   }
   
} 