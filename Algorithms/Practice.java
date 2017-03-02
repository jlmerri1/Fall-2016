public class Practice
{
   public static void main(String [] args)
   {
      int [][] w = {{0, 15, 0, 0, 10, 0, 0},
                    {0, 0, 3, 0, 0, 0, 0},
                    {0, 0, 0, 0, 0, 0, 7},
                    {0, 0, 0, 0, 0, 0, 0},
                    {0, 0, 25, 0, 0, 0, 0},
                    {0, 0, 0, 0, 0, 0, 0},
                    {0, 0, 0, 0, 0, 0, 0}
                    };
                    
      int [][] a = {{0, 0, 0, 0, 10, 0, 15, 0},
                    {0, 0, 0, 0, 0, 0, 0, 0},
                    {0, 0, 0, 0, 0, 0, 19, 0},
                    {0, 0, 0, 0, 0, 0, 30, 0},
                    {0, 0, 0, 0, 0, 0, 25, 0},
                    {0, 0, 0, 0, 0, 0, 0, 0},
                    {23, 0, 21, 0, 0, 0, 0, 6},
                    {0, 0, 0, 0, 0, 0, 0, 0}
                    };
                    
                    
      printVertex(w);              
      printEdge(w);
      printIso(w); 
      
      System.out.println();
      
      printVertex(a);              
      printEdge(a);
      printIso(a);               
   }
   
   
   public static void printVertex(int [][] w)
   {
      System.out.print("V = {");
   
      int count = 1;
   
      for(int i = 0; i < w.length-1; i++)
      {
         System.out.print(count + ", ");
         count++;
      }
  
      System.out.println(count + "}");
   }
   
   
   public static void printEdge(int [][] w)
   {
      System.out.print("E = {");
      
      for(int i = 0; i < w.length; i++)
      {
         for(int j = 0; j < w.length; j++)
         {
            if(w[i][j] > 0)
            {
               System.out.print("(" + (i + 1) + "," + (j + 1) + ")");
            }
         }
      }
      System.out.println("}");        
   }
   
   
   public static void printIso(int [][] w)
   {
      System.out.print("Isolated = {");
      
      int count = 0;   

      for(int i = 0; i < w.length; i++)
      {
         count = 0;
         
         for(int j = 0; j < w.length; j++)
         {
            if((w[i][j] == 0) && (w[j][i] == 0))
               count++;
         }
         if(count == w.length)
            System.out.print(i+1 + ",");
      }  
      System.out.print("}");      
   } 
}