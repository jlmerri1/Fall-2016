public class FibonacciNumbers
{
   static int[] fibArray;

   public static void main(String [] args)
   {
      int n = 45;
      
      long startTime = System.currentTimeMillis();
      System.out.println(fib(n));
      long elapsedTime = System.currentTimeMillis() - startTime;
      System.out.print("Time cost: " + elapsedTime / 1000.0 + "s.");
      
      fibArray = new int[n];
      startTime = System.currentTimeMillis();
      System.out.println(fibDP(n));
      elapsedTime = System.currentTimeMillis() - startTime;
      System.out.print("Time cost: " + elapsedTime / 1000.0 + "s.");    
      
      
   }
   
   //recursive fibonacci algorithm
   public static int fib(int n)
   {
      if(n <= 1)
         return 1;
      else
         return fib(n - 1) + fib(n - 2);
   }
   
   //recursive Fibonacci algorithm with Dynamic Programing (DP)
   public static int fibDP(int n)
   {
      if( n <= 1)
         return 1;
      else
      {
         //check if fibArray [n-1] is calculated
         if(fibArray[n-1] == 0)
            fibArray[n -1]  = fibDP(n - 1);
            
         if(fibArray[n-2] == 0)
            fibArray[n -2]  = fibDP(n - 2);
            
         return fibArray[n-1] + fibArray[n-1];
      }   
   }
}