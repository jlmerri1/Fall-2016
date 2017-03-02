public class MatrixMultiplication
{
   public static void main(String [] args)
   {
      int [][] a =   {
                     {10, 20, 30},
                     {40, 50, 60},
                     {70, 80, 90}};
                     
      int [][] b =   {
                     {1, 2, 3},
                     {4, 5, 6},
                     {7, 8, 9}};
      int n = 3;
      
      int [][] c = new int[n][n];
   
      matrixMult(n, a, b, c);
   
      for(int i = 0; i < n; i++)
      {
         for(int j = 0; j < n; j++)
         {
            System.out.print(c[i][j] + " ");     
         }
         System.out.println();
      }
   } 
   public static void matrixMult(int n, int [][] a, int [][] b, int [][] c)
   {   
      for(int i = 0; i < n; i++)
      {
         for(int j = 0; j < n; j++)
         {
            c[i][j] = 0;
          
            for(int k = 0; k < n; k++)
            {
               c[i][j] += a[i][k] * b[k][j];
            }
         }
      } 
   }
}