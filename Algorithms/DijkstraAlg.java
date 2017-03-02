public class DijkstraAlg
{
   private static int inf = 99999;
   
   public static void main(String [] args)
   {
   int [][] W = { {0, 0,   0,   0,   0,   0,   0},
                  {0, 0,   10,  6,   inf, 20,  12},    //v1
                  {0, inf, 0,   5,   25,  inf, inf},   //v2
                  {0, inf, inf, 0,   2,   7,   inf},   //v3
                  {0, inf, inf, inf, 0,   inf, 8},     //v4
                  {0, inf, inf, inf, inf, 0,   2},     //v5
                  {0, inf, inf, inf, 13,  inf, 0}      //v6
                };
   int n = 6;
   
   String f = dijkstra(n, W);
   System.out.println(f.substring(0, f.length() - 2));
   
   }
   
   public static String dijkstra(int n, int [][] w)
   {
      int vNear = -1;
      int vStart, vEnd;
      int [] touch = new int [n + 1];
      int [] length = new int [n + 1];
      String f = "";  //edge set
      
      for(int i = 2; i <= n; i++)  //start with 2 because we don't have to check itself
      {
         touch[i] = 1;
         length[i] = w[1][i];
      }
      
      for(int j = 0; j < n - 1; j++)
      {
         int min = inf;
         
         for(int i = 2; i <= n; i++)
         {
            if(length[i] >= 0 && length[i] < min)
            {
               min = length[i];
               vNear = i;
            }
         }   
         
         vStart = touch[vNear];
         vEnd = vNear;
         f += "(" + vStart + ", " + vEnd + "), ";
         
         for(int i = 2; i <= n; i++)
         {
            if(length[vNear] + w[vNear][i] < length[i])
            {
               length[i] = length[vNear] + w[vNear][i];
               touch[i] = vNear;
            }
         } 
         
         length[vNear] = -1;
         
      }
      return f;
   }
}